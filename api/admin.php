<?php
// Lista zgłoszeń dla prowadzącego: statusy, usuwanie, eksport CSV. Chroniona hasłem.
declare(strict_types=1);
require __DIR__ . '/lib.php';

const STATUSES = ['nowe', 'zrobione', 'odrzucone'];
const COLUMNS = ['id', 'created_at', 'author', 'text', 'module', 'section', 'slide_key', 'part', 'slide_number', 'slide_title', 'status'];

session_set_cookie_params([
    'httponly' => true,
    'samesite' => 'Strict',
    'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
]);
session_start();
header('Cache-Control: no-store');
header('X-Frame-Options: DENY');

function e($s): string
{
    return htmlspecialchars((string) $s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function filter_query(): string
{
    return in_array($_GET['status'] ?? '', STATUSES, true) ? '?status=' . $_GET['status'] : '';
}

function back(): void
{
    header('Location: admin.php' . filter_query());
    exit;
}

function page(string $body): void
{
    echo '<!doctype html><html lang="pl"><head><meta charset="utf-8">'
        . '<meta name="viewport" content="width=device-width, initial-scale=1"><title>Sugestie do slajdów</title><style>'
        . 'body{font:14px system-ui,sans-serif;color:#333;margin:24px;max-width:1100px}a{color:#1f8f8d}'
        . 'table{border-collapse:collapse;width:100%}th,td{border-bottom:1px solid #ddd;padding:8px;text-align:left;vertical-align:top}'
        . 'th{background:#f5f5f5}.text{white-space:pre-wrap;overflow-wrap:anywhere}form{display:inline}'
        . 'nav{display:flex;gap:14px;align-items:center;margin-bottom:14px;flex-wrap:wrap}.err{color:#a00}'
        . '</style></head><body><h1>Sugestie do slajdów</h1>' . $body . '</body></html>';
    exit;
}

$password = config()['admin_password'];
if ($password === '') {
    http_response_code(503);
    page('<p>Panel jest wyłączony: ustaw hasło w <code>api/config.php</code> (wzór: <code>config.sample.php</code>).</p>');
}

$csrf = $_SESSION['csrf'] ?? ($_SESSION['csrf'] = bin2hex(random_bytes(16)));

if (empty($_SESSION['admin'])) {
    $error = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
        if (hash_equals($password, (string) $_POST['password'])) {
            session_regenerate_id(true);
            $_SESSION['admin'] = true;
            back();
        }
        sleep(2);  // spowalnia zgadywanie hasła
        $error = '<p class="err">Złe hasło.</p>';
    }
    page($error . '<form method="post"><label>Hasło <input type="password" name="password" autofocus required></label> '
        . '<button>Zaloguj</button></form>');
}

$pdo = db();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!hash_equals($csrf, (string) ($_POST['csrf'] ?? ''))) {
        http_response_code(403);
        page('<p class="err">Sesja wygasła, odśwież stronę.</p>');
    }
    $id = (int) ($_POST['id'] ?? 0);
    if (isset($_POST['logout'])) {
        $_SESSION = [];
        session_destroy();
    } elseif (isset($_POST['delete'])) {
        $pdo->prepare('DELETE FROM suggestions WHERE id = ?')->execute([$id]);
    } elseif (in_array($_POST['new_status'] ?? '', STATUSES, true)) {
        $pdo->prepare('UPDATE suggestions SET status = ? WHERE id = ?')->execute([$_POST['new_status'], $id]);
    }
    back();
}

$filter = in_array($_GET['status'] ?? '', STATUSES, true) ? $_GET['status'] : '';
$query = $pdo->prepare('SELECT * FROM suggestions' . ($filter ? ' WHERE status = ?' : '') . ' ORDER BY id DESC');
$query->execute($filter ? [$filter] : []);
$rows = $query->fetchAll();

if (isset($_GET['csv'])) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="sugestie.csv"');
    $out = fopen('php://output', 'w');
    fwrite($out, "\xEF\xBB\xBF");  // BOM: Excel poprawnie czyta polskie znaki
    fputcsv($out, COLUMNS, ';', '"', '');
    foreach ($rows as $row) {
        $line = [];
        foreach (COLUMNS as $column) {
            $v = (string) $row[$column];
            // Apostrof przed =+-@ blokuje formuły w arkuszu
            $line[] = preg_match('/^[=+\-@\t\r]/', $v) ? "'" . $v : $v;
        }
        fputcsv($out, $line, ';', '"', '');
    }
    exit;
}

$html = '<nav><a href="admin.php">Wszystkie</a>';
foreach (STATUSES as $s) {
    $html .= '<a href="?status=' . $s . '">' . ucfirst($s) . '</a>';
}
$html .= '<a href="?csv=1' . ($filter ? '&amp;status=' . $filter : '') . '">Eksport CSV</a>'
    . '<form method="post"><input type="hidden" name="csrf" value="' . e($csrf) . '"><button name="logout" value="1">Wyloguj</button></form></nav>';

if (!$rows) {
    page($html . '<p>Brak zgłoszeń.</p>');
}

$action = 'admin.php' . filter_query();
$html .= '<table><tr><th>Kiedy</th><th>Kto</th><th>Slajd</th><th>Sugestia</th><th>Status</th><th></th></tr>';
foreach ($rows as $r) {
    $when = (new DateTime($r['created_at']))->setTimezone(new DateTimeZone('Europe/Warsaw'))->format('Y-m-d H:i');
    $label = e($r['module']) . ' · slajd ' . (int) $r['slide_number']
        . ($r['slide_key'] !== '' ? '<br><small>' . e($r['slide_key']) . ' · część ' . ((int) $r['part'] + 1) . '</small>' : '');
    // Plik wybrany z dysku nie ma adresu na stronie
    if (strpos($r['module'], 'plik: ') !== 0) {
        $url = '../?m=' . rawurlencode($r['module']);
        if ($r['slide_key'] !== '') {
            $url .= '&k=' . rawurlencode($r['section'] . ':' . $r['slide_key'] . ':' . $r['part']);
        }
        $url .= '#/' . max(0, (int) $r['slide_number'] - 1);
        $label = '<a href="' . e($url) . '" target="_blank" rel="noopener">' . $label . '</a>';
    }
    $hidden = '<input type="hidden" name="csrf" value="' . e($csrf) . '"><input type="hidden" name="id" value="' . (int) $r['id'] . '">';
    $options = '';
    foreach (STATUSES as $s) {
        $options .= '<option' . ($s === $r['status'] ? ' selected' : '') . '>' . $s . '</option>';
    }
    $html .= '<tr><td>' . e($when) . '</td><td>' . e($r['author']) . '</td><td>' . $label . '<br>' . e($r['slide_title']) . '</td>'
        . '<td class="text">' . e($r['text']) . '</td>'
        . '<td><form method="post" action="' . e($action) . '">' . $hidden . '<select name="new_status">' . $options . '</select> <button>Zapisz</button></form></td>'
        . '<td><form method="post" action="' . e($action) . '" onsubmit="return confirm(\'Usunąć to zgłoszenie?\')">' . $hidden
        . '<button name="delete" value="1">Usuń</button></form></td></tr>';
}
page($html . '</table>');

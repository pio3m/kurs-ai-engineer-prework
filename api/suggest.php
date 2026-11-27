<?php
// GET: czy zgłoszenia działają (od tego zależy przycisk na slajdach). POST (JSON): nowe zgłoszenie.
declare(strict_types=1);
require __DIR__ . '/lib.php';

const MAX_PER_WINDOW = 10;   // zgłoszeń z jednego adresu...
const WINDOW_SECONDS = 600;  // ...w 10 minut

function answer(int $code, array $body): void
{
    http_response_code($code);
    header('Content-Type: application/json; charset=utf-8');
    header('Cache-Control: no-store');
    echo json_encode($body, JSON_UNESCAPED_UNICODE);
    exit;
}

function field(array $in, string $name, int $max): string
{
    $v = $in[$name] ?? '';
    if (!is_scalar($v)) {
        return '';
    }
    $v = trim((string) $v);
    // Obcięcie po znakach (UTF-8) bez zależności od rozszerzenia mbstring
    return preg_match('/^.{0,' . $max . '}/us', $v, $m) ? $m[0] : '';
}

try {
    $pdo = db();
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        answer(200, ['ok' => true]);
    }
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        answer(405, ['ok' => false, 'error' => 'Niedozwolona metoda.']);
    }
    // Tylko application/json: obca strona nie wyśle takiego żądania bez zgody CORS
    if (stripos($_SERVER['CONTENT_TYPE'] ?? '', 'application/json') !== 0) {
        answer(415, ['ok' => false, 'error' => 'Oczekiwany JSON.']);
    }
    $in = json_decode((string) file_get_contents('php://input', false, null, 0, 20000), true);
    if (!is_array($in)) {
        answer(400, ['ok' => false, 'error' => 'Niepoprawne dane.']);
    }
    if (field($in, 'website', 100) !== '') {
        answer(200, ['ok' => true]);  // ukryte pole wypełniają tylko boty
    }
    $author = field($in, 'author', 80);
    $text = field($in, 'text', 2000);
    $module = field($in, 'module', 120);
    if ($author === '' || $text === '' || $module === '') {
        answer(400, ['ok' => false, 'error' => 'Wpisz imię i treść sugestii.']);
    }
    $ip = hash('sha256', ($_SERVER['REMOTE_ADDR'] ?? '') . __DIR__);
    $recent = $pdo->prepare('SELECT COUNT(*) FROM suggestions WHERE ip_hash = ? AND created_at > ?');
    $recent->execute([$ip, gmdate('Y-m-d\TH:i:s\Z', time() - WINDOW_SECONDS)]);
    if ((int) $recent->fetchColumn() >= MAX_PER_WINDOW) {
        answer(429, ['ok' => false, 'error' => 'Za dużo zgłoszeń naraz. Spróbuj za kilka minut.']);
    }
    $pdo->prepare('INSERT INTO suggestions
        (created_at, author, text, module, section, slide_key, part, slide_number, slide_title, ip_hash)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)')->execute([
        gmdate('Y-m-d\TH:i:s\Z'), $author, $text, $module,
        field($in, 'section', 20), field($in, 'slide_key', 80), field($in, 'part', 10),
        max(0, (int) field($in, 'slide_number', 6)), field($in, 'slide_title', 200), $ip,
    ]);
    answer(201, ['ok' => true]);
} catch (Throwable $e) {
    error_log('suggest.php: ' . $e->getMessage());
    answer(500, ['ok' => false, 'error' => 'Nie udało się zapisać. Spróbuj później.']);
}

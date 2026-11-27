<?php
// Wspólne rzeczy dla suggest.php i admin.php: konfiguracja i baza SQLite.
declare(strict_types=1);

function config(): array
{
    $file = is_file(__DIR__ . '/config.php') ? require __DIR__ . '/config.php' : [];
    return [
        'admin_password' => (string) ($file['admin_password'] ?? (getenv('SLAJDY_ADMIN_PASSWORD') ?: '')),
        'db' => (string) ($file['db'] ?? (getenv('SLAJDY_DB') ?: __DIR__ . '/data/sugestie.sqlite')),
    ];
}

function db(): PDO
{
    $path = config()['db'];
    $dir = dirname($path);
    if (!is_dir($dir)) {
        mkdir($dir, 0750, true);
    }
    // Domyślny katalog leży w folderze strony, więc zamykamy do niego dostęp z przeglądarki (Apache)
    if ($dir === __DIR__ . '/data' && !is_file("$dir/.htaccess")) {
        file_put_contents("$dir/.htaccess", "Require all denied\n");
    }
    $pdo = new PDO('sqlite:' . $path, null, null, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_TIMEOUT => 5,
    ]);
    $pdo->exec("CREATE TABLE IF NOT EXISTS suggestions (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        created_at TEXT NOT NULL,
        author TEXT NOT NULL,
        text TEXT NOT NULL,
        module TEXT NOT NULL,
        section TEXT NOT NULL,
        slide_key TEXT NOT NULL,
        part TEXT NOT NULL,
        slide_number INTEGER NOT NULL,
        slide_title TEXT NOT NULL,
        status TEXT NOT NULL DEFAULT 'nowe',
        ip_hash TEXT NOT NULL
    )");
    return $pdo;
}

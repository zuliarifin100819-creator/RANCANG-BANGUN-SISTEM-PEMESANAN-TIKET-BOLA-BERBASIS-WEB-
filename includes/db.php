<?php
declare(strict_types=1);
const DB_HOST = '127.0.0.1';
const DB_NAME = 'lagakita';
const DB_USER = 'root';
const DB_PASS = '';

try {
    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4', DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $exception) {
    http_response_code(500);
    exit('Koneksi database gagal. Ikuti langkah impor database di README.md.');
}

function e(string|int|float|null $value): string { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
function rupiah(int|float|string $value): string { return 'Rp'.number_format((float)$value, 0, ',', '.'); }

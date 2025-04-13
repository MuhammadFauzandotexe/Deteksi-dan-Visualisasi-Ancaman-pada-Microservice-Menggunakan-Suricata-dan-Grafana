<?php

header("Content-Type: application/json");

// Tangkap request URI dan method
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Simulasi endpoint login
if ($uri === '/login' && $method === 'POST') {
    echo json_encode(["message" => "Simulasi login"]);
    exit;
}

// Simulasi endpoint search (raw query param bisa dipakai untuk SQLi/XSS)
if ($uri === '/search' && $method === 'GET') {
    $query = $_GET['q'] ?? '';
    echo json_encode(["message" => "Hasil pencarian untuk: $query"]);
    exit;
}

// Simulasi file handler (untuk test LFI atau RCE via param)
if ($uri === '/file' && $method === 'GET') {
    $path = $_GET['path'] ?? '';
    echo json_encode(["message" => "Akses file: $path"]);
    exit;
}

// Simulasi RCE
if ($uri === '/execute' && $method === 'POST') {
    $cmd = $_POST['cmd'] ?? '';
    echo json_encode(["message" => "Menjalankan perintah: $cmd"]);
    exit;
}

// Default 404 response
http_response_code(404);
echo json_encode(["error" => "Endpoint tidak ditemukan"]);

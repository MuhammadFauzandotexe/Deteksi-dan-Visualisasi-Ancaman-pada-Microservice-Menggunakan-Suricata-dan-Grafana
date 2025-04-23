<?php
header('Content-Type: application/json');

// Endpoint utama
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode([
        'message' => 'Welcome to Dummy API for Suricata Testing',
        'endpoints' => [
            'GET /' => 'This info page',
            'POST /login' => 'Simulate login (test brute force)',
            'GET /search' => 'Test SQL injection (q parameter)',
            'GET /comment' => 'Test XSS (comment parameter)',
            'GET /execute' => 'Test RCE (cmd parameter)',
            'GET /file' => 'Test LFI (filename parameter)',
            'GET /auth' => 'Test Basic Auth brute force'
        ]
    ]);
    exit;
}

// Endpoint untuk test SQL Injection
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], '/search') === 0) {
    $query = $_GET['q'] ?? '';
    
    // Ini hanya simulasi, tidak benar-benar menjalankan query SQL
    if (strpos(strtolower($query), "' or '1'='1") !== false) {
        echo json_encode([
            'error' => 'Search failed',
            'message' => 'Your search query looks suspicious'
        ]);
    } else {
        echo json_encode([
            'results' => [
                ['id' => 1, 'title' => 'Result 1 for ' . htmlspecialchars($query)],
                ['id' => 2, 'title' => 'Result 2 for ' . htmlspecialchars($query)]
            ]
        ]);
    }
    exit;
}

// Endpoint untuk test XSS
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], '/comment') === 0) {
    $comment = $_GET['comment'] ?? '';
    
    if (strpos(strtolower($comment), '<script>') !== false) {
        echo json_encode([
            'error' => 'Invalid comment',
            'message' => 'Script tags are not allowed in comments'
        ]);
    } else {
        echo json_encode([
            'status' => 'Comment received',
            'comment' => htmlspecialchars($comment)
        ]);
    }
    exit;
}

// Endpoint untuk test brute force login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], '/login') === 0) {
    // Simulasi delay untuk response login
    usleep(rand(100000, 300000)); // 100-300ms delay
    
    echo json_encode([
        'status' => 'Login failed',
        'message' => 'Invalid username or password'
    ]);
    exit;
}

// Endpoint untuk test RCE
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], '/execute') === 0) {
    $cmd = $_GET['cmd'] ?? '';
    
    if (strpos(strtolower($cmd), '/bin/sh') !== false || strpos(strtolower($cmd), 'system(') !== false) {
        echo json_encode([
            'error' => 'Command execution blocked',
            'message' => 'Suspicious command detected'
        ]);
    } else {
        echo json_encode([
            'status' => 'Command not executed',
            'message' => 'This is just a simulation. No commands are actually executed.',
            'your_input' => htmlspecialchars($cmd)
        ]);
    }
    exit;
}

// Endpoint untuk test LFI
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], '/file') === 0) {
    $filename = $_GET['filename'] ?? '';
    
    if (strpos(strtolower($filename), '/etc/passwd') !== false || strpos(strtolower($filename), 'php://') !== false) {
        echo json_encode([
            'error' => 'File access blocked',
            'message' => 'Attempt to access restricted file detected'
        ]);
    } else {
        echo json_encode([
            'status' => 'File access not allowed',
            'message' => 'This is just a simulation. No files are actually accessed.',
            'your_input' => htmlspecialchars($filename)
        ]);
    }
    exit;
}

// Endpoint untuk test brute force basic auth
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], '/auth') === 0) {
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header('WWW-Authenticate: Basic realm="Dummy API"');
        header('HTTP/1.0 401 Unauthorized');
        echo json_encode(['error' => 'Authentication required']);
        exit;
    }
    
    // Selalu return unauthorized untuk memicu brute force detection
    header('HTTP/1.0 401 Unauthorized');
    echo json_encode([
        'error' => 'Unauthorized',
        'message' => 'Invalid credentials'
    ]);
    exit;
}

// Default response for unknown endpoints
header('HTTP/1.0 404 Not Found');
echo json_encode(['error' => 'Endpoint not found']);

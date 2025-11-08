<?php
header('Content-Type: application/json; charset=utf-8');

$key = isset($_GET['key']) ? trim($_GET['key']) : "";

if ($key === "") {
    echo json_encode(["status" => "ERROR", "message" => "no_key"]);
    exit;
}

// Wczytanie kluczy z JSON
$keysFile = __DIR__ . '/keys.json';
$keysData = file_exists($keysFile) ? json_decode(file_get_contents($keysFile), true) : [];

if (isset($keysData[$key])) {
    $expires = $keysData[$key];
    $today = date("Y-m-d");

    if ($expires >= $today) {
        echo json_encode([
            "status" => "VALID",
            "expires" => $expires
        ]);
    } else {
        echo json_encode([
            "status" => "EXPIRED",
            "expires" => $expires
        ]);
    }
} else {
    echo json_encode(["status" => "INVALID"]);
}
?>




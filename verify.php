<?php
header('Content-Type: application/json; charset=utf-8');

$validKeys = [
    "TESTKEY123",
    "ANOTHER-KEY-456"
    "WidowSecretKey"
];

$key = isset($_GET['key']) ? trim($_GET['key']) : "";

if ($key === "") {
    echo json_encode(["status" => "ERROR", "message" => "no_key"]);
    exit;
}

if (in_array($key, $validKeys, true)) {
    echo json_encode([
        "status" => "VALID",
        "expires" => date("Y-m-d", strtotime("+30 days"))
    ]);
} else {
    echo json_encode(["status" => "INVALID"]);
}
?>


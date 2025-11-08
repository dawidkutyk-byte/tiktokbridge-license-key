<?php
header('Content-Type: application/json; charset=utf-8');

// 🔐 Lista ważnych kluczy (dodawaj własne ręcznie)
$validKeys = [
    "TESTKEY123",
    "ANOTHER-KEY-456"
];

// pobranie klucza z URL, np. verify.php?key=TESTKEY123
$key = isset($_GET['key']) ? trim($_GET['key']) : "";

if ($key === "") {
    echo json_encode(["status" => "ERROR", "message" => "no_key"]);
    exit;
}

// sprawdzamy, czy klucz jest na liście
if (in_array($key, $validKeys, true)) {
    echo json_encode([
        "status" => "VALID",
        "expires" => date("Y-m-d", strtotime("+30 days"))
    ]);
} else {
    echo json_encode(["status" => "INVALID"]);
}
?>

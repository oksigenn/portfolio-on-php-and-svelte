<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

$method = $_SERVER["REQUEST_METHOD"];
$servername = "localhost";
$username = "root"; // по умолчанию для AMPPS
$password = "mysql"; // по умолчанию для AMPPS
$dbname = "portfolio-feedback";
// Подключение к базе данных
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Запрос на получение всех отзывов
$sql = "SELECT * FROM reviews ORDER BY id DESC";
$result = $conn->query($sql);

$reviews = [];
while ($row = $result->fetch_assoc()) {
  $reviews[] = $row;
}

echo json_encode($reviews);

$conn->close();
?>

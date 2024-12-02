<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $feedback = htmlspecialchars($_POST['feedback']);
    $created_at = htmlspecialchars($_POST['created_at']); // Принимаем время от клиента

    // Подключение к базе данных
    $conn = new mysqli("localhost", "root", "mysql", "portfolio-feedback");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Запрос на добавление отзыва
    $sql = "INSERT INTO reviews (name, feedback, created_at) VALUES ('$name', '$feedback', '$created_at')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Отзыв добавлен"]);
    } else {
        echo json_encode(["error" => "Ошибка: " . $conn->error]);
    }

    $conn->close();
}
?>

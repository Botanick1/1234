<?php
require 'config.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id'];

    $sql = 'INSERT INTO ads (user_id, title, description) VALUES (:user_id, :title, :description)';

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['user_id' => $user_id, 'title' => $title, 'description' => $description]);
        header('Location: ads.php');
        exit();
    } catch (PDOException $e) {
        echo 'Ошибка: ' . $e->getMessage();
    }
}
?>

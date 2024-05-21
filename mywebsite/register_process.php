<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = 'INSERT INTO users (username, email, password) VALUES (:username, :email, :password)';

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username, 'email' => $email, 'password' => $password]);
        header('Location: login.php');
        exit();
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo 'Пользователь с таким именем или email уже существует.';
        } else {
            echo 'Ошибка: ' . $e->getMessage();
        }
    }
}
?>

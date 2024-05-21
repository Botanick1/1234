<?php
// Подключаем файл с настройками базы данных
require 'config.php';

// Проверяем, был ли отправлен POST-запрос
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из POST-запроса
    $title = $_POST['title'];
    $description = $_POST['description'];
    // Предполагая, что у вас есть переменная $_SESSION['user_id'] с ID текущего пользователя
    $user_id = $_SESSION['user_id'];

    // SQL-запрос для вставки данных в таблицу объявлений
    $sql = 'INSERT INTO ads (user_id, title, description) VALUES (:user_id, :title, :description)';

    try {
        // Подготавливаем SQL-запрос
        $stmt = $pdo->prepare($sql);
        // Выполняем SQL-запрос, передавая данные в виде параметров
        $stmt->execute(['user_id' => $user_id, 'title' => $title, 'description' => $description]);
        // Возвращаем сообщение об успешной публикации объявления
        echo 'Объявление успешно опубликовано!';
    } catch (PDOException $e) {
        // Возвращаем сообщение об ошибке, если что-то пошло не так
        echo 'Ошибка: ' . $e->getMessage();
    }
}
?>

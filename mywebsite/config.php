<?php
$dsn = 'mysql:host=localhost;dbname=mywebsite';
$db_user = 'Mikhail'; 
$db_password = '1234';

try {
    $pdo = new PDO($dsn, $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Подключение не удалось: ' . $e->getMessage());
}
?>
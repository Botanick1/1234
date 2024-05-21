<?php
session_start();
include 'header.php';
?>

<main>
    <h2>Авторизация</h2>
    <form action="login_process.php" method="post">
        <label for="username">Имя пользователя:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Войти</button>
    </form>
</main>

<?php
include 'footer.php';
?>

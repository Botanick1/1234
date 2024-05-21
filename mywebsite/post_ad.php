<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include 'header.php';
?>

<main>
    <h2>Публикация объявления</h2>
    <form action="post_ad_process.php" method="post">
        <label for="title">Заголовок:</label>
        <input type="text" id="title" name="title" required><br><br>
        <label for="description">Описание:</label>
        <textarea id="description" name="description" required></textarea><br><br>
        <button type="submit">Опубликовать</button>
    </form>
</main>

<?php
include 'footer.php';
?>

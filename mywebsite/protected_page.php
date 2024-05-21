<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include 'header.php';
?>

<main>
    <h2>Добро пожаловать, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>Это защищенная страница.</p>
    <a href="post_ad.php">Опубликовать объявление</a><br>
    <a href="ads.php">Просмотр всех объявлений</a><br>
    <a href="logout.php">Выйти</a>
</main>

<?php
include 'footer.php';
?>

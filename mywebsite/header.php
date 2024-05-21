<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задание 1</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Задание 1</h1>
        <nav>
            <ul>
                <li><a href="index.php">Главная</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="protected_page.php">Личный кабинет</a></li>
                    <li><a href="post_ad.php">Опубликовать объявление</a></li>
                    <li><a href="ads.php">Объявления</a></li>
                    <li><a href="logout.php">Выйти</a></li>
                <?php else: ?>
                    <li><a href="register.php">Регистрация</a></li>
                    <li><a href="login.php">Вход</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

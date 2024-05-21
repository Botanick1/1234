<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require 'config.php';

$sql = 'SELECT ads.id, ads.title, ads.description, ads.created_at, users.username FROM ads JOIN users ON ads.user_id = users.id ORDER BY ads.created_at DESC';
$stmt = $pdo->query($sql);
$ads = $stmt->fetchAll(PDO::FETCH_ASSOC);

include 'header.php';
?>

<main>
    <h2>Все объявления</h2>
    <?php foreach ($ads as $ad): ?>
        <div>
            <h3><?php echo htmlspecialchars($ad['title']); ?></h3>
            <p><?php echo htmlspecialchars($ad['description']); ?></p>
            <p><small>Опубликовано: <?php echo $ad['created_at']; ?>, пользователем: <?php echo htmlspecialchars($ad['username']); ?></small></p>
        </div>
        <hr>
    <?php endforeach; ?>
</main>

<?php
include 'footer.php';
?>

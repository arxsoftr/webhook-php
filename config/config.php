<?php
include '../includes/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bot_name = $_POST['bot_name'];
    $webhook_link = $_POST['webhook_link'];
    $profile_image = $_POST['profile_image'];

    $stmt = $pdo->prepare("INSERT INTO webhook_settings (bot_name, webhook_link, profile_image) VALUES (?, ?, ?)");
    $stmt->execute([$bot_name, $webhook_link, $profile_image]);
    header("Location: next_step.php");
    exit();
}
?>

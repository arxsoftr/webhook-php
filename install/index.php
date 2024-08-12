<?php
include '../config/config.php';

$messageSent = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $botName = $_POST['bot_name'];
    $webhookLink = $_POST['webhook_link'];
    $profileImage = $_POST['profile_image'];

    try {
        $stmt = $pdo->prepare("INSERT INTO webhook_settings (bot_name, webhook_link, profile_image) VALUES (?, ?, ?)");
        $stmt->execute([$botName, $webhookLink, $profileImage]);
        $messageSent = true;
    } catch (PDOException $e) {
        $error = "Hata: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>arxsoftr.® Webhook Project Setup</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<div class="header">
    <label for="language">Dil:</label>
    <select id="language" name="language" onchange="changeLanguage(this.value)">
        <option value="tr">Türkçe</option>
        <option value="en">English</option>
    </select>
</div>

<div class="container">
    <h1 data-tr="arxsoftr.® Webhook Projesi Kurulumu" data-en="arxsoftr.® Webhook Project Setup">arxsoftr.® Webhook Project Setup</h1>
    
    <?php if ($messageSent): ?>
        <p class="message success-message" data-tr="Ayarlar başarıyla kaydedildi!" data-en="Settings saved successfully!">Ayarlar başarıyla kaydedildi!</p>
    <?php elseif ($error): ?>
        <p class="message error-message" data-tr="Bir hata oluştu: <?php echo htmlspecialchars($error); ?>" data-en="An error occurred: <?php echo htmlspecialchars($error); ?>"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <form action="" method="post">
        <label for="bot_name" data-tr="Bot İsmi" data-en="Bot Name">Bot İsmi</label>
        <input type="text" id="bot_name" name="bot_name" required>

        <label for="webhook_link" data-tr="Webhook Linki" data-en="Webhook Link">Webhook Linki</label>
        <input type="text" id="webhook_link" name="webhook_link" required>

        <label for="profile_image" data-tr="Profil Fotoğrafı URL" data-en="Profile Image URL">Profil Fotoğrafı URL</label>
        <input type="text" id="profile_image" name="profile_image" required>

        <input type="submit" value="Kaydet ve Devam Et" data-tr="Kaydet ve Devam Et" data-en="Save and Continue">
    </form>
</div>

<script>
    function changeLanguage(lang) {
        document.querySelectorAll('[data-tr]').forEach(el => {
            el.textContent = el.getAttribute(`data-${lang}`);
        });
        document.querySelectorAll('.message').forEach(el => {
            el.textContent = el.getAttribute(`data-${lang}`);
            el.style.display = 'block';
        });
    }

    const savedLang = localStorage.getItem('lang') || 'en';
    document.getElementById('language').value = savedLang;
    changeLanguage(savedLang);

    document.getElementById('language').addEventListener('change', (e) => {
        localStorage.setItem('lang', e.target.value);
    });
</script>

</body>
</html>

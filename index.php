<?php
include 'includes/database.php';

$messageSent = false;
$error = '';
$noRecords = false;

try {
    $stmt = $pdo->query("SELECT bot_name, webhook_link, profile_image FROM webhook_settings ORDER BY id DESC LIMIT 1");
    $settings = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($settings) {
        $botName = $settings['bot_name'];
        $webhookLink = $settings['webhook_link'];
        $profileImage = $settings['profile_image'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
            $userMessage = $_POST['message'];

            $data = [
                "username" => $botName,
                "avatar_url" => $profileImage,
                "content" => $userMessage
            ];

            $options = [
                'http' => [
                    'method'  => 'POST',
                    'header'  => "Content-Type: application/json\r\n",
                    'content' => json_encode($data),
                ]
            ];

            $context  = stream_context_create($options);
            $result = file_get_contents($webhookLink, false, $context);

            if ($result === FALSE) {
                $error = "Mesaj gönderilirken bir hata oluştu.";
            } else {
                $messageSent = true;
            }
        }
    } else {
        $noRecords = true;
    }

} catch (PDOException $e) {
    $error = "Hata: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-tr="arxsoftr | WebHook Projesi" data-en="arxsoftr | Webhook Project">arxsoftr | WebHook Projesi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #121212;
            color: #fff;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            margin: 0;
            position: relative;
            min-height: 100vh;
        }

        .container {
            background-color: #1f1f1f;
            padding: 30px;
            border-radius: 10px;
            width: 400px;
            margin: 0 auto;
        }

        h1 {
            color: #e50914;
        }

        label {
            display: block;
            margin: 15px 0 5px;
            font-weight: bold;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
            resize: none;
            height: 100px;
        }

        input[type="submit"], .install-button {
            background-color: #e50914;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        input[type="submit"]:hover, .install-button:hover {
            background-color: #b20610;
        }

        .message {
            margin-top: 20px;
            font-size: 16px;
        }

        .header {
            position: absolute;
            top: 10px;
            left: 10px;
            display: flex;
            gap: 10px;
        }

        .header select {
            background-color: #333;
            color: #fff;
            border: 1px solid #444;
            border-radius: 5px;
            padding: 5px;
            font-family: Arial, sans-serif;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #1f1f1f;
            padding: 20px;
            color: #ddd;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            font-family: 'Ubuntu', sans-serif;
            font-weight: bold;
        }

        footer .social-icons a {
            color: #ddd;
            font-size: 24px;
            text-decoration: none;
        }

        footer .social-icons a:hover {
            color: #e50914;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
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
    <h1 data-tr="Discord Mesaj Gönderimi" data-en="Discord Message Sending">Discord Mesaj Gönderimi</h1>
    <?php if ($messageSent): ?>
        <p class="message" data-tr="Mesaj başarıyla gönderildi!" data-en="Message sent successfully!">Mesaj başarıyla gönderildi!</p>
    <?php elseif ($error): ?>
        <p class="message" data-tr="Mesaj gönderilirken bir hata oluştu." data-en="An error occurred while sending the message."><?php echo htmlspecialchars($error); ?></p>
    <?php elseif ($noRecords): ?>
        <p class="message" data-tr="Veritabanında kayıt bulunamadı." data-en="No records found in the database.">Veritabanında kayıt bulunamadı.</p>
        <a href="install/" class="install-button" data-tr="Kurulum Sayfasına Git" data-en="Go to Installation Page">Kurulum Sayfasına Git</a>
    <?php else: ?>
        <form action="" method="post">
            <label for="message" data-tr="Gönderilecek Mesaj" data-en="Message to Send">Gönderilecek Mesaj</label>
            <textarea id="message" name="message" placeholder="Merhaba, ..."></textarea>
            <input type="submit" value="Mesajı Gönder" data-en="Send Message" data-tr="Mesajı Gönder">
        </form>
    <?php endif; ?>
</div>

<footer>
    <div class="social-icons">
        <a href="https://whatsapp.com/channel/0029VakSPMEF1YlSepEmUJ0c" target="_blank" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
        <a href="https://t.me/arxsoftr" target="_blank" title="Telegram"><i class="fab fa-telegram-plane"></i></a>
        <a href="https://discord.gg/b8he38FReG" target="_blank" title="Discord"><i class="fab fa-discord"></i></a>
    </div>
    <span>arxsoftr®</span>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script>
    function changeLanguage(lang) {
        document.querySelectorAll('[data-tr]').forEach(el => {
            el.textContent = el.getAttribute(`data-${lang}`);
        });
    }

    const savedLang = localStorage.getItem('lang') || 'tr';
    document.getElementById('language').value = savedLang;
    changeLanguage(savedLang);

    document.getElementById('language').addEventListener('change', (e) => {
        localStorage.setItem('lang', e.target.value);
    });
</script>

</body>
</html>

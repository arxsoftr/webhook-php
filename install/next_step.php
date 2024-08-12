<?php
$redirect_delay = 3; 

header("refresh:$redirect_delay;url=../index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-tr="Kurulum Başarılı" data-en="Setup Successful">Kurulum Başarılı</title>
    <link rel="stylesheet" href="style.css">
    <style>
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
            font-family: 'Ubuntu', sans-serif;
        }
    </style>
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
    <h1 data-tr="Kurulum Başarılı!" data-en="Setup Successful!">Kurulum Başarılı!</h1>
    <p data-tr="Kurulum tamamlandı, ana sayfaya yönlendiriliyorsunuz..." data-en="Setup is complete, redirecting to the home page...">Kurulum tamamlandı, ana sayfaya yönlendiriliyorsunuz...</p>
    <p data-tr="Lütfen bekleyin..." data-en="Please wait...">Lütfen bekleyin...</p>
</div>

<script>
    function changeLanguage(lang) {
        document.querySelectorAll('[data-tr]').forEach(el => {
            el.textContent = el.getAttribute(`data-${lang}`);
        });
        document.querySelectorAll('title').forEach(el => {
            el.textContent = el.getAttribute(`data-${lang}`);
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


Webhook-PHP

# Webhook Project
![Img](https://media.discordapp.net/attachments/1064901142531805254/1272489267007852564/image.png?ex=66bb297a&is=66b9d7fa&hm=3ca4be00f317f3beb7289033d0fbfbe5dfc8ca60c5498120c4ce6c6442aec762&=&format=webp&quality=lossless&width=1440&height=642)

![Img](https://cdn.discordapp.com/attachments/1064901142531805254/1272489334783873075/image.png?ex=66bb298b&is=66b9d80b&hm=070900cf7ea10ec077f50eeb97b74cdb55d2cab14c4d2733e6fb3632d5a39dc3&)

This project is a simple PHP application for sending messages to a Discord webhook. It includes a user interface for inputting a message and sending it to the configured webhook URL.

## Features

- **Webhook Integration**: Send messages to a Discord webhook with customizable bot settings.
- **Dynamic Configuration**: Fetch bot settings (name, profile image, webhook URL) from a database.
- **User Interface**: A form for users to input and send messages.
- **Error Handling**: Display error messages if there are issues with sending the message or if no records are found.
- **Language Support**: Basic support for Turkish and English languages.

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/arxsoftr/webhook-php.git
2. Navigate to the project directory:
```bash
cd webhook-php
```
3. Set up your database and configure the includes/database.php file with your database credentials.

4. Import the provided SQL schema into your database to create the necessary tables.

5. Customize the webhook_settings table with your Discord webhook details.
## Usage
Visit the index.php page to interact with the application.

Input a message and submit the form to send it to the configured Discord webhook.


### Türkçe Açıklama

# Webhook Projesi
![Img](https://media.discordapp.net/attachments/1064901142531805254/1272489183784734730/image.png?ex=66bb2967&is=66b9d7e7&hm=2f0e08310f0d4a6d0f09e04eabb1275cfde39deeb60a4bd75b6a273c1882d5be&=&format=webp&quality=lossless&width=1440&height=652)

![Img](https://cdn.discordapp.com/attachments/1064901142531805254/1272489334783873075/image.png?ex=66bb298b&is=66b9d80b&hm=070900cf7ea10ec077f50eeb97b74cdb55d2cab14c4d2733e6fb3632d5a39dc3&)

Bu proje, bir Discord webhook'una mesaj göndermek için basit bir PHP uygulamasıdır. Kullanıcıların bir mesaj girmelerini ve bu mesajı yapılandırılmış webhook URL'sine göndermelerini sağlayan bir kullanıcı arayüzü içerir.

## Özellikler

- **Webhook Entegrasyonu**: Mesajları, özelleştirilebilir bot ayarları ile bir Discord webhook'una gönderin.
- **Dinamik Konfigürasyon**: Bot ayarlarını (isim, profil resmi, webhook URL'si) veritabanından çekin.
- **Kullanıcı Arayüzü**: Kullanıcıların mesaj girip gönderebileceği bir form.
- **Hata Yönetimi**: Mesaj gönderme veya kayıt bulunamama durumunda hata mesajları görüntüleme.
- **Dil Desteği**: Temel Türkçe ve İngilizce dil desteği.

## Kurulum

1. Depoyu klonlayın:
   ```bash
   git clone https://github.com/arxsoftr/webhook-php.git
2. Proje dizinine gidin:
   ```bash
    cd webhook-php
3. Veritabanınızı ayarlayın ve includes/database.php dosyasını veritabanı bilgilerinize göre yapılandırın.
4. Gerekli tabloları oluşturmak için sağlanan SQL şemasını veritabanınıza aktarın.
4. webhook_settings tablosunu Discord webhook detaylarınızla özelleştirin.
## Kullanım
Uygulama ile etkileşimde bulunmak için index.php sayfasına gidin.
Bir mesaj girin ve formu göndererek yapılandırılmış Discord webhook'una iletin.





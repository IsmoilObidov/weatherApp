<br/>
<p align="center">
  <a href="https://github.com/IsmoilObidov/weatherApp">
    <img src="https://cdn2.iconfinder.com/data/icons/weather-flat-14/64/weather03-1024.png" alt="Logo" width="80" height="80">
  </a>

  <h3 align="center">Тестовой задание</h3>

  <p align="center">
    Специальное тестовое задание для проверки моих знаний.
  </p>
</p>

![Downloads](https://img.shields.io/github/downloads/IsmoilObidov/weatherApp/total) ![Contributors](https://img.shields.io/github/contributors/IsmoilObidov/weatherApp?color=dark-green) ![Stargazers](https://img.shields.io/github/stars/IsmoilObidov/weatherApp?style=social) 

## About The Project

![Screen Shot](https://icon-library.com/images/weather-icon-gif/weather-icon-gif-15.jpg)

Создал с просьбой компание ``CLICK DEVELOPMENT`` , * тествое задание

## Built With

Необходимые настройки :
```sh
PHP ^8.1
Laravel ^10.10
Pattern MVC
```

## Settings

Необходимые настройки :
```sh
PHP ^8.1
Laravel ^10.10
```

## Set up

* git 

```sh
git clone https://github.com/IsmoilObidov/ABDigitalTest.git
```

* для установки библиотеки нашего проекта необходима 
```sh
composer install
```


### Requirements

Начинаем:

* Сначала нам нужно создать, настроить и добавить некоторые конфигурации в наш .env-файл.

```JS
TELEGRAM_BOT_TOKEN=6370989311:AAFKWH2YMTO1is18MXlYS_wCMGr8sZzsOos

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_USERNAME=ismoilobidov10001@gmail.com
MAIL_PASSWORD=nbkxtnzvxhuovaok
MAIL_PORT=465
MAIL_ENCRYPTION=SSL
MAIL_FROM_ADDRESS=nonereply@istamgroup.com
```

* все данные которые я указал вверху нужны чтобы наш проект мог `отправить email`  и  `отправить сообщение через телеграм бот` .

* для того чтобы мы могли принимать уведомление через телеграмм бот, необходимо нажимать start на тест бота. 
[Test Telegram Bot](https://t.me/ExceptionHandlerABDbot)

* настройки на MAILER не надо трогать, если не уверены :)

## Commands

```sh
php artisan weather Tashkent
```

```sh
php artisan weather Tashkent mail gmail@gmail.com 
```

```sh
php artisan weather Tashkent telegram chat_id
```

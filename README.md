# gest/telegest

## 📖 Description

**gest/telegest** is a small PHP library for interacting with the Telegram Bot API. It is designed to simplify the process of creating and managing Telegram bots, presenting a user-friendly interface for working with the Telegram API.

## 🚀 Features
- Sending messages and media files
- Processing incoming messages and commands
- Asynchronous HTTP request support via Guzzle and ReactPHP
- Dependency injection using PHP-DI

## ⚙️ Installation 

### You can install the library using Composer:

```bash
composer require gest/telegest
```


## 📚 Usage/Examples
### 🤖 Echo bot
```php
// set bot config
$config = Config::getInstance();
$config->set('token', $token);

$bot = new TGBot();
$updateHandler = $bot->getUpdateHandler();

// On every message (UpdateType::ALL)
$updateHandler->attachCallable(UpdateType::ALL, 
    function($message) {
        $message = new Message($message);
        (new TGBotClient)->sendMessage($message);
    });
// run loop get updates
$updateHandler->handleUpdates()->run();
```


## 🛠️ Stack

**Bible Library:** ReactPHP, Guzzle, PHP-DI
[![PHP Version](https://img.shields.io/badge/php-%3E%3D%208.3-blue.svg)](https://www.php.net/releases/8_3.php)

[![Guzzle](https://img.shields.io/badge/guzzle-%5E7.8-green.svg)](https://github.com/guzzle/guzzle)

[![ReactPHP](https://img.shields.io/badge/reactphp-%5E0.4.3-lightgrey.svg)](https://reactphp.org/)

[![PHP-DI](https://img.shields.io/badge/php--di-%5E7.0-orange.svg)](https://php-di.org/)

[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)

## 🆘 Support

 gestjobm@gmail.com

---

# gest/telegest

## 📖 Описание

**gest/telegest** - это небольшая PHP-библеотека для взаимодействия с API Telegram Bot. Она предназначена для упрощения процесса создания и управления Telegram-ботами, представляя удобный интерфейс для работы с API Telegram.

## 🚀 Возможности
- Отправка сообщений и медиафайлов
- Обработка входящих сообщений и команд
- Поддержка асинхронного HTTP-запроса через Guzzle и ReactPHP
- Внедрение зависимостей с использованием PHP-DI

## ⚙️ Установка 

### Установить библиотеку можно с помощью Composer:

```bash
composer require gest/telegest
```


## 📚 Использование/Примеры
### 🤖 Бот ретранслятор сообщений
```php
// set bot config
$config = Config::getInstance();
$config->set('token', $token);

$bot = new TGBot();
$updateHandler = $bot->getUpdateHandler();

// On every message (UpdateType::ALL)
$updateHandler->attachCallable(UpdateType::ALL, 
    function($message) {
        $message = new Message($message);
        (new TGBotClient)->sendMessage($message);
    });
// run loop get updates
$updateHandler->handleUpdates()->run();
```


## 🛠️ Стек

**Библеотека:** ReactPHP, Guzzle, PHP-DI
[![PHP Version](https://img.shields.io/badge/php-%3E%3D%208.3-blue.svg)](https://www.php.net/releases/8_3.php)

[![Guzzle](https://img.shields.io/badge/guzzle-%5E7.8-green.svg)](https://github.com/guzzle/guzzle)

[![ReactPHP](https://img.shields.io/badge/reactphp-%5E0.4.3-lightgrey.svg)](https://reactphp.org/)

[![PHP-DI](https://img.shields.io/badge/php--di-%5E7.0-orange.svg)](https://php-di.org/)

[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)

## 🆘 Поддержка

 gestjobm@gmail.com

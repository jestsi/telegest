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
$bot = new TGBot($token);

$bot
    ->getUpdateHandler()
    ->attachCallable(UpdateType::Message, fn($message) => (new TGBotClient)->sendMessage($message))
    ->handleUpdates()
    ->run();
```
### Answer on inline query

```php
$bot = new TGBot($token);
$bot
    ->getUpdateHandler()
    ->attachCallable(UpdateType::InlineQuery, function ($query) use ($bot) {
        $builder = (new InlineQueryAnswerBuilder($query->id))
            ->addArticleResult('1', 'test', '/delete')
            ->addPhotoResult('2', 
                'https://w7.pngwing.com/pngs/140/284/png-transparent-animated-woody-illustation-buzz-lightyear-sheriff-woody-jessie-toy-story-film-toy-story-cartoon-pixar-toy-story-3.png', 
                'https://www.pinclipart.com/picdir/big/209-2099521_thumb-up-comments-english-lovers-clipart.png')
            ->addLocationResult('3', 48.90174, 2.27829, 'Париж');
        (new TGBotClient)->sendAnswerInlineQuery($builder);
    })
    ->handleUpdates()
    ->run();
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
$bot = new TGBot($token);

$bot
    ->getUpdateHandler()
    ->attachCallable(UpdateType::Message, fn($message) => (new TGBotClient)->sendMessage($message))
    ->handleUpdates()
    ->run();
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

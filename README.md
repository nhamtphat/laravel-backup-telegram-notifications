# Laravel Backup Telegram Notifications

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nhamtphat/laravel-backup-telegram-notifications.svg?style=flat-square)](https://packagist.org/packages/nhamtphat/laravel-backup-telegram-notifications)
[![Total Downloads](https://img.shields.io/packagist/dt/nhamtphat/laravel-backup-telegram-notifications.svg?style=flat-square)](https://packagist.org/packages/nhamtphat/laravel-backup-telegram-notifications)
[![License](https://img.shields.io/packagist/l/nhamtphat/laravel-backup-telegram-notifications.svg?style=flat-square)](https://github.com/nhamtphat/laravel-backup-telegram-notifications/blob/master/LICENSE.md)

A wrapper for [spatie/laravel-backup](https://github.com/spatie/laravel-backup) to send beautified Telegram notifications. This package is a fork of [hotrush/laravel-backup-telegram-notifications](https://github.com/hotrush/laravel-backup-telegram-notifications).

## ✨ Features

- **Beautified Notifications**: Rich HTML-formatted Telegram messages with emojis and clear structure.
- **Easy Integration**: Seamlessly works with the existing Spatie Backup notification system.
- **Customizable**: Uses Blade views for notification templates, allowing for easy customization.

## 🚀 Installation

You can install the package via composer:

```bash
composer require nhamtphat/laravel-backup-telegram-notifications
```

## ⚙️ Configuration

### 1. Configure Telegram Bot

Add your Telegram Bot Token to your `config/services.php` file:

```php
// config/services.php
'telegram-bot-api' => [
    'token' => env('TELEGRAM_BOT_TOKEN'),
],
```

### 2. Configure Backup Notifications

In your `config/backup.php` file, update the `notifications` section to use the Telegram channel and this package's notification classes.

```php
// config/backup.php

use NotificationChannels\Telegram\TelegramChannel;
use NhamtPhat\SpatieBackup\Notifications\Notifiable;
use NhamtPhat\SpatieBackup\Notifications\Notifications\BackupHasFailedNotification;
use NhamtPhat\SpatieBackup\Notifications\Notifications\BackupWasSuccessfulNotification;
use NhamtPhat\SpatieBackup\Notifications\Notifications\CleanupHasFailedNotification;
use NhamtPhat\SpatieBackup\Notifications\Notifications\CleanupWasSuccessfulNotification;
use NhamtPhat\SpatieBackup\Notifications\Notifications\HealthyBackupWasFoundNotification;
use NhamtPhat\SpatieBackup\Notifications\Notifications\UnhealthyBackupWasFoundNotification;

'notifications' => [
    'notifications' => [
        BackupHasFailedNotification::class => [TelegramChannel::class],
        UnhealthyBackupWasFoundNotification::class => [TelegramChannel::class],
        CleanupHasFailedNotification::class => [TelegramChannel::class],
        BackupWasSuccessfulNotification::class => [TelegramChannel::class],
        HealthyBackupWasFoundNotification::class => [TelegramChannel::class],
        CleanupWasSuccessfulNotification::class => [TelegramChannel::class],
    ],

    'notifiable' => Notifiable::class,

    'telegram' => [
        'channel_id' => env('TELEGRAM_CHAT_ID'),
    ],
],
```

Don't forget to add `TELEGRAM_BOT_TOKEN` and `TELEGRAM_CHAT_ID` to your `.env` file.

## 🛠 Usage

Once configured, notifications will be sent automatically by the `spatie/laravel-backup` package whenever a backup event occurs.

## 📄 License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
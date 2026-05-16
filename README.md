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

### 1. Configure Backup Notifications

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
        'channel_id' => env('TELEGRAM_BACKUP_CHAT_ID', env('TELEGRAM_CHAT_ID')),
    ],
],
```

Alternatively, you can publish the package config file:

```bash
php artisan vendor:publish --tag="laravel-backup-telegram-config"
```

This will create a `config/backup-telegram.php` file where you can manage your Telegram settings. The package will automatically use these values as fallbacks if they are not defined in `config/backup.php`.

Don't forget to add `TELEGRAM_BACKUP_BOT_TOKEN` (or `TELEGRAM_BOT_TOKEN`) and `TELEGRAM_BACKUP_CHAT_ID` (or `TELEGRAM_CHAT_ID`) to your `.env` file.

## 🛠 Usage

Once configured, notifications will be sent automatically by the `spatie/laravel-backup` package whenever a backup event occurs.

## 📄 License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
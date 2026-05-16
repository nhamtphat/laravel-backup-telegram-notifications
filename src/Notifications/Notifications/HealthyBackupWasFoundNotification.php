<?php

namespace NhamtPhat\SpatieBackup\Notifications\Notifications;

use Spatie\Backup\Notifications\Notifications\HealthyBackupWasFoundNotification as BaseNotification;
use NotificationChannels\Telegram\TelegramMessage;
use NhamtPhat\SpatieBackup\Notifications\Traits\SendsTelegramBackupNotifications;

class HealthyBackupWasFoundNotification extends BaseNotification
{
    use SendsTelegramBackupNotifications;

    public function toTelegram($notifiable): TelegramMessage
    {
        return $this->telegramMessage()
            ->view('laravel-backup-tg-notifications::successful', [
                'message' => '✅ ' . trans('backup::notifications.healthy_backup_found_subject', [
                    'application_name' => $this->applicationName(),
                    'disk_name' => $this->diskName(),
                ]),
                'properties' => $this->backupDestinationProperties(),
            ]);
    }
}
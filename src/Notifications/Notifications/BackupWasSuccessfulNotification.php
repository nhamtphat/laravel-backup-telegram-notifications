<?php

namespace NhamtPhat\SpatieBackup\Notifications\Notifications;

use Spatie\Backup\Notifications\Notifications\BackupWasSuccessfulNotification as BaseNotification;
use NotificationChannels\Telegram\TelegramMessage;
use NhamtPhat\SpatieBackup\Notifications\Traits\SendsTelegramBackupNotifications;

class BackupWasSuccessfulNotification extends BaseNotification
{
    use SendsTelegramBackupNotifications;

    public function toTelegram($notifiable): TelegramMessage
    {
        return $this->telegramMessage()
            ->view('laravel-backup-tg-notifications::successful', [
                'message' => '✅ ' . trans('backup::notifications.backup_successful_subject', [
                    'application_name' => $this->applicationName(),
                ]),
                'properties' => $this->backupDestinationProperties(),
            ]);
    }
}
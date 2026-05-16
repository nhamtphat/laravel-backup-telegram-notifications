<?php

namespace NhamtPhat\SpatieBackup\Notifications\Notifications;

use Spatie\Backup\Notifications\Notifications\BackupHasFailedNotification as BaseNotification;
use NotificationChannels\Telegram\TelegramMessage;
use NhamtPhat\SpatieBackup\Notifications\Traits\SendsTelegramBackupNotifications;

class BackupHasFailedNotification extends BaseNotification
{
    use SendsTelegramBackupNotifications;

    public function toTelegram($notifiable): TelegramMessage
    {
        return $this->telegramMessage()
            ->view('laravel-backup-tg-notifications::failed', [
                'message' => '❌ ' . trans('backup::notifications.backup_failed_subject', [
                    'application_name' => $this->applicationName(),
                ]),
                'exception' => $this->event->exception,
                'properties' => $this->backupDestinationProperties(),
            ]);
    }
}
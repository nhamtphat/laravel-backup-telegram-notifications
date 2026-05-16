<?php

namespace NhamtPhat\SpatieBackup\Notifications\Notifications;

use Spatie\Backup\Notifications\Notifications\CleanupWasSuccessfulNotification as BaseNotification;
use NotificationChannels\Telegram\TelegramMessage;
use NhamtPhat\SpatieBackup\Notifications\Traits\SendsTelegramBackupNotifications;

class CleanupWasSuccessfulNotification extends BaseNotification
{
    use SendsTelegramBackupNotifications;

    public function toTelegram($notifiable): TelegramMessage
    {
        return $this->telegramMessage()
            ->view('laravel-backup-tg-notifications::successful', [
                'message' => '✅ ' . trans('backup::notifications.cleanup_successful_subject', [
                    'application_name' => $this->applicationName(),
                ]),
                'properties' => $this->backupDestinationProperties(),
            ]);
    }
}
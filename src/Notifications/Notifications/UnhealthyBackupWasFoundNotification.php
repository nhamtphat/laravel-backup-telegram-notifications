<?php

namespace NhamtPhat\SpatieBackup\Notifications\Notifications;

use Spatie\Backup\Notifications\Notifications\UnhealthyBackupWasFoundNotification as BaseNotification;
use NotificationChannels\Telegram\TelegramMessage;
use NhamtPhat\SpatieBackup\Notifications\Traits\SendsTelegramBackupNotifications;

class UnhealthyBackupWasFoundNotification extends BaseNotification
{
    use SendsTelegramBackupNotifications;

    public function toTelegram($notifiable): TelegramMessage
    {
        return $this->telegramMessage()
            ->view('laravel-backup-tg-notifications::failed', [
                'message' => '❌ ' . trans('backup::notifications.unhealthy_backup_found_subject', [
                    'application_name' => $this->applicationName(),
                ]),
                'exception' => $this->failure()->exception(),
                'description' => $this->problemDescription(),
                'properties' => $this->backupDestinationProperties(),
            ]);
    }
}
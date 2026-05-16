<?php

namespace NhamtPhat\SpatieBackup\Notifications\Traits;

use NotificationChannels\Telegram\TelegramMessage;

trait SendsTelegramBackupNotifications
{
    /**
     * Get a Telegram message instance with default settings.
     *
     * @return \NotificationChannels\Telegram\TelegramMessage
     */
    protected function telegramMessage(): TelegramMessage
    {
        return (new TelegramMessage)
            ->token(config('backup-telegram.bot_token'))
            ->options([
                'parse_mode' => 'HTML',
                'disable_web_page_preview' => true,
            ]);
    }
}

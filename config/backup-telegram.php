<?php

return [
    /*
     * The bot token of the Telegram bot that will send the notifications.
     */
    'bot_token' => env('TELEGRAM_BACKUP_BOT_TOKEN', env('TELEGRAM_BOT_TOKEN')),

    /*
     * The chat ID to which the notifications will be sent.
     */
    'chat_id' => env('TELEGRAM_BACKUP_CHAT_ID', env('TELEGRAM_CHAT_ID')),
];

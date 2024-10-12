<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-db/requests.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-data/track.php";

function telegramSend($chat_id, $text)
{
    $token = get_config_required(telegram_bot_api_token);
    return http_post("https://api.telegram.org/bot$token/sendMessage", [
        chat_id => $chat_id,
        text => $text,
    ]);
}


function telegramSendToAddress($bot, $address, $message)
{
    $wallet_link_telegram = getEvent(wallet, $address, telegram);
    $username = $wallet_link_telegram[to_id];
    $telegram_link_chat = getEvent(telegram, $username, $bot);
    telegramSend($telegram_link_chat[to_id], $message);
}
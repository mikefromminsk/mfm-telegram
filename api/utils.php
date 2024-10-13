<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-db/requests.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-data/track.php";

function telegramSend($bot, $chat_id, $text)
{
    $token = get_config_required($bot . "_token");
    $response = http_post("https://api.telegram.org/bot$token/sendMessage", [
        chat_id => $chat_id,
        text => $text,
    ]);

    if ($response[ok] == true) {
        trackAccumulate('telegram_send');
        trackEvent('telegram_bot', $bot, 'chat', $chat_id, 'send', $text);
    } else {
        error($response);
    }
}

function telegramSendToAddress($address, $message)
{
    $bot = mytoken_space_bot;
    $wallet_link_telegram = getEvent(wallet, $address, telegram);
    $username = $wallet_link_telegram[to_id];
    $telegram_link_chat = getEvent(telegram, $username, $bot);
    telegramSend($bot, $telegram_link_chat[to_id], $message);
}
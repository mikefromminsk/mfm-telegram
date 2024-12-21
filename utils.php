<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-db/requests";
require_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-analytics/utils.php";

function telegramSend($chat_id, $text)
{
    if (empty($chat_id)) {
        return;
    }
    $token = get_config_required( "telegram_bot_token");
    $response = http_post("https://api.telegram.org/bot$token/sendMessage", [
        chat_id => $chat_id,
        text => $text,
    ]);

    if ($response[ok] == true) {
        trackAccumulate(telegram_send);
        trackEvent(telegram, send, [
            chat_id => $chat_id,
            text => $text,
        ]);
    } else {
        error($response);
    }
}

function telegramGetReceiverInfo($address)
{
    $link_event = getEvent(ui, tg_link, null, $address);
    if ($link_event == null) return null;
    $username = $link_event[value];
    $start_event = getEvent(tg, start, null, $username);
    if ($start_event == null) return null;
    return getObject($start_event[value]);
}

function telegramSendToAddress($address, $message)
{
    $start_object = telegramGetReceiverInfo($address);
    if (is_string($start_object)) error($start_object);
    return telegramSend($start_object[chat_id], $message);
}
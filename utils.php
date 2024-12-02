<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-db/requests.php";
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

function telegramSendToAddress($address, $message)
{
    $link_event = getEvent(ui, tg_link, null, $address);
    if ($link_event == null) error("No telegram connection for $address");
    $username = $link_event[value];
    $start_event = getEvent(tg, start, null, $username);
    if ($start_event == null) error("No telegram chat for $username");
    $start_object = getObject($start_event[value]);
    telegramSend($start_object[chat_id], $message);
    return $address . " " . json_encode($start_event) . " " . $message;
}
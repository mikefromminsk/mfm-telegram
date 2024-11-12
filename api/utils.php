<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-db/requests.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-analytics/utils.php";

function telegramSend($bot, $chat_id, $text)
{
    if (empty($chat_id)) {
        return;
    }
    $token = get_config_required($bot . "_token");
    $response = http_post("https://api.telegram.org/bot$token/sendMessage", [
        chat_id => $chat_id,
        text => $text,
    ]);

    if ($response[ok] == true) {
        trackAccumulate('telegram_send');
        trackEvent('send', 'telegram_bot', $bot, 'chat', $chat_id, $text);
    } else {
        error($response);
    }
}

function telegramSendToAddress($address, $message)
{
    $bot = mytoken_space_bot;
    $wallet_link_telegram = getEvent(link, wallet, $address, telegram);
    if ($wallet_link_telegram == null) error("No telegram connection for $address");
    $username = $wallet_link_telegram[to_id];
    $telegram_link_chat = getEvent(received, telegram, $username, $bot);
    if ($telegram_link_chat == null) error("No telegram chat for $username");
    telegramSend($bot, $telegram_link_chat[to_id], $message);
    return $address . " " . json_encode($telegram_link_chat) . " " . $message;
}
<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-telegram/api/utils.php";

$bot = get_required(bot);
$username = get_required(username);
$message = get_required(message);

$event = getEvent(telegram, $username, $bot);

telegramSend($bot, $event[to_id], $message);
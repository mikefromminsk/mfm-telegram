<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-telegram/api/utils.php";

$bot = get_required(bot);
$address = get_required(address);
$message = get_required(message);

telegramSendToAddress($bot, $address, $message);
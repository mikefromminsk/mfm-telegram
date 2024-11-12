<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-telegram/api/utils.php";

$address = get_required(address);
$message = get_required(message);

telegramSendToAddress($address, $message);
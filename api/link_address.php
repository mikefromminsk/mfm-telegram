<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-telegram/api/utils.php";

$username = get_required("username");
$address = get_required("address");

trackEvent(telegram_link, $username, $address);

telegramSendToAddress($address, "Linked to account $address");

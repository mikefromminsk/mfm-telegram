<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-telegram/api/utils.php";

$address = get_required("address");
$username = get_required("username");

trackEvent(wallet, $address, telegram, $username, 'link');

telegramSendToAddress($address, "Linked to account $address");

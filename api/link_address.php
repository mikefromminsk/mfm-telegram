<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-telegram/api/utils.php";

$address = get_required("address");
$username = get_required("username");

trackEvent(link, wallet, $address, telegram, $username);

telegramSendToAddress($address, "Linked to account $address");

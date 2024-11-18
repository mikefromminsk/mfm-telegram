<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-telegram/utils.php";

$channel = get_required(channel);
$tran = get_required(data);

if ($tran[amount] <= 0) error("Invalid amount");

$message = "You have received $tran[amount] " . strtoupper($tran[domain]) . " from $tran[from]";
telegramSendToAddress($tran[to], $message);
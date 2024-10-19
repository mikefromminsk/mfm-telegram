<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-telegram/api/utils.php";

$channel = get_required(channel);
$tran = get_required(data);

if ($tran[amount] == 0) {
    $message = "You register $tran[domain] token in wallet";
} else {
    $message = "You have received $tran[amount] " . strtoupper($tran[domain]) . " from $tran[from]";
}

$response = telegramSendToAddress($tran[to], $message);


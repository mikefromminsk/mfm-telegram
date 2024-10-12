<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-telegram/api/utils.php";

$channel = get_required(channel);
$tran = get_required(data);

telegramSendToAddress(mytoken_space_bot, $tran[to],
    "You have received $tran[amount] " . strtoupper($tran[domain]) . " from $tran[from]");


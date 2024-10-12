<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-token/utils.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-telegram/api/properties.php";

$telegram_bot_apis = get_required(telegram_bot_apis);
$bot = get_required(bot);



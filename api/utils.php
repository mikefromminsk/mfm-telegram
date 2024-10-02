<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-token/utils.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-telegram/api/properties.php";

$telegram_bot_apis = get_required(telegram_bot_apis);
$bot = get_required(bot);

$telegram_bot_api = $telegram_bot_apis[$bot];


function telegramSend($bot, $username, $text)
{
    $telegram_bot_api = get_required(telegram_bot_api);
    return http_post("https://api.telegram.org/bot$telegram_bot_api/sendMessage", [
        chat_id => dataGet([telegram, users, $bot, $username]),
        text => $text,
    ]);
}

$db_name = get_required("db_name");
$db_user = get_required("db_user");
$db_pass = get_required("db_pass");

$mysql_conn = $GLOBALS["conn"];
if ($mysql_conn == null)
    $mysql_conn = new mysqli("localhost", $db_user, $db_pass, $db_name); // change localhost to $host_name

if ($mysql_conn->connect_error)
    error("Connection failed: " . $mysql_conn->connect_error . " check properties.php file");

if ($save_properties == true) {
    $properties = "<?php\n";
    $properties .= "\$db_name = \"$db_name\";\n";
    $properties .= "\$db_user = \"$db_user\";\n";
    $properties .= "\$db_pass = \"$db_pass\";\n";
    file_put_contents($_SERVER["DOCUMENT_ROOT"] . "/mfm-db/properties.php", $properties);
}

unset($db_name);
unset($db_user);
unset($db_pass);
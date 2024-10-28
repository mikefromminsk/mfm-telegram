<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-telegram/api/utils.php";

$bot = get_required(bot);
$message = get_required(message);

trackEvent(telegram, $message[chat][username], $bot, $message[chat][id], 'received', $message[text]);

if ($message[text] == '/start') {
    $event = getEvent(telegram, $message[chat][username], $bot);
    telegramSend(mytoken_space_bot, $event[to_id], "Hello, $event[from_id]! Tap Play button.");
}


/*"message":{
    "date":1441645532,
  "chat":{
        "last_name":"Test Lastname",
     "id":1111111,
     "type": "private",
     "first_name":"Test Firstname",
     "username":"Testusername"
  },
  "message_id":1365,
  "from":{
        "last_name":"Test Lastname",
     "id":1111111,
     "first_name":"Test Firstname",
     "username":"Testusername"
  },
  "forward_from": {
        "last_name":"Forward Lastname",
     "id": 222222,
     "first_name":"Forward Firstname"
  },
  "forward_date":1441645550,
  "text":"/start"
}*/


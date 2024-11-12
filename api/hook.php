<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-telegram/api/utils.php";

$message = get_required(message);

if ($message[text] == '/start') {
    $event = getEvent(telegram_start, $message[chat][username]);
    if ($event == null)
        trackEvent(telegram_start, $message[chat][username], $message[chat][id]);
    telegramSend($message[chat][id], "Hello, ${$message[chat][username]}! Tap Play button.");
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


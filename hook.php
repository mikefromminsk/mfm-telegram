<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-telegram/utils.php";

$message = get_required(message);

if ($message[text] == '/start') {
    trackEvent(tg, start, [
        username => $message[chat][username],
        chat_id => $message[chat][id],
        first_name => $message[from][first_name],
        last_name => $message[from][last_name],
    ], $message[chat][username]);
    telegramSend($message[chat][id], "Hello! Tap Play button.");
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


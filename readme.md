получи API ключ в BotFather
сгенерируй валидный сертификат
openssl req -x509 -days 365 -sha256 -nodes -newkey rsa:2048 -keyout webserver.key -out webserver.cert -subj \"/C=US/ST=New York/L=Brooklyn/O=Example Brooklyn Company/CN=mytoken.space\"",
нужно отправить через postman. Запросом FormData

тестим в 
https://api.telegram.org/bot$telegram_bot_api/getWebhookInfo



https://api.telegram.org/bot$telegram_bot_api/setWebhook
https://mytoken.space/mfm-telegram/hook.php
certificate => "[c:\\webserver.cert]"

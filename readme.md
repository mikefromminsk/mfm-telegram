generate bot api token from BotFather
install openssl
openssl req -x509 -days 1365 -sha256 -nodes -newkey rsa:2048 -keyout privkey.pem -out cert.pem -subj \"/C=US/ST=New York/L=Brooklyn/O=Example Brooklyn Company/CN=vavilon.org\"",
GET https://api.telegram.org/bot$telegram_bot_api/setWebhook
url => https://vavilon.org:8443/mytoken_space_bot
certificate => FormData "[c:\\webserver.cert]"
https://api.telegram.org/bot$telegram_bot_api/getWebhookInfo
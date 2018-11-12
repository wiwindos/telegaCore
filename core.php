<php
include_once('./core/GetDataFromChat.php');
include_once('./core/Methods.php');
include_once('./core/DefaultSettings.php');

$stream = webHook::getData();					//подрубаем входящие данные
//$logs = Logs::setLog();							//подрубаем логи

//session_id(Message::getChatId());	//сессия
//@session_start();

//if ( isset($data[message][entities]) ){}

/////////////////////////////////////// обновление BD, большой кейс (проверка состояния по сессии, инлайн, сообщения с команд, кнопок и тд)
SendMessage::send("DAROVA");
echo(getenv('TOKEN'));
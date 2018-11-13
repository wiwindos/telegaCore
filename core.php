<?php
include_once (dirname(__FILE__).'/core/GetDataFromChat.php');
include_once (dirname(__FILE__).'/core/Methods.php');
include_once (dirname(__FILE__).'/core/DefaultSettings.php');

$stream = webHook::getData();					//подрубаем входящие данные
//$logs = Logs::setLog();							//подрубаем логи

session_id(Message::getChatId());	//сессия
@session_start();

/*if ( isset($data[message][entities]) ){}*/

/*/////////////////////////////////////// обновление BD, большой кейс (проверка состояния по сессии, инлайн, сообщения с команд, кнопок и тд)*/

if(Message::getText() == "1"){
    $msg = "Здравствуй,".Message::getFromFirstName()."!";
    SendMessage::send($msg);
}
$a = Message::getText();
SendMessage::send($a);
?>
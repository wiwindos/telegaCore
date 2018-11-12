<?
include_once('./core/GetDataFromChat.php');
include_once('./core/Methods.php');
include_once('./core/DefaultSettings.php');

$stream = webHook::getData();					//подрубаем входящие данные
//$logs = Logs::setLog();							//подрубаем логи

session_id(Message::getChatId());	//сессия
@session_start();

//if ( isset($data[message][entities]) ){}

/////////////////////////////////////// обновление BD, большой кейс (проверка состояния по сессии, инлайн, сообщения с команд, кнопок и тд)

abstract class Shopproduct{
	private $title;
	private $price;
	//private $type;
	
	function __construct ($title, $price){
		$this->title = $title;
		$this->price = $price;
	}	
	
 	public function getTitle(){
		return $this->title;
	}
	public function getPrice(){
		return $this->price;
	}
	
	abstract public function get();
	
	static function FabricMetod($title, $price, $type){
		if ($type == "CDProduct"){
			return new CDProduct($title, $price);
		}
		elseif ($type == "BookProduct"){
			return new BookProduct($title, $price);
		}
		else return null;
	}
	
	//abstract function test();
}

/* class Fabric{
	static function FabricMetod($title, $price, $type){
		if ($type == "CDProduct"){
			return new CDProduct($title, $price);
		}
		elseif ($type == "BookProduct"){
			return new BookProduct($title, $price);
		}
		else return null;
	}
} */

class CDProduct extends Shopproduct{
	public function __construct ($title, $price){
		parent::__construct($title, $price);
	}
	
	function get(){
		return "CDProduct";
	}
	
	function test(){
		//parent::test();
		return "a";
	}
}

class BookProduct extends Shopproduct{
	public function __construct ($title, $price){
		parent::__construct($title, $price);
	}
	
	function get(){
		return "BookProduct";
	}
	
	function test(){
		//parent::test();
		return "b";
	}
}

//$factory = new Fabric();
$productCD = Shopproduct::FabricMetod('hui', 20, "CDProduct");
SendMessage::send($productCD->get());

abstract class SpWriter{
	protected $products = array();
	
	public function addProduct ( Shopproduct $shopproduct ){
		$this->products[]=$shopproduct;
	}
	
	abstract public function write();
}

class CDWriter extends SpWriter{
	public function write(){
		SendMessage::send(1);
	}
}

class BookWriter extends SpWriter{
	public function write(){
		SendMessage::send(2);
	}
}

/* $Product1 = new CDProduct("verka", 20);
$Product2 = new BookProduct("kosmos", 20);
$SpWriter = new CDWriter;
$SpWriter->addProduct($Product1);
$SpWriter->addProduct($Product2);
$SpWriter->write();

$q1 = $Product1->getTitle();
$q2 = $Product2->getTitle(); */


//SendMessage::send($q1);
//SendMessage::send($q2);




////////////////////SQL///////////////////////////
/* $mysql = DefaultSettings::connectDB();
//Global $mysql;
$table = "zuserbot"; //работа с БД zuserbot
$query = $mysql->query("SELECT * FROM $table WHERE id = '148918255' LIMIT 0,1");
$resalut = mysqli_fetch_assoc($query);
$qq = $resalut[allBalance]; */

////////////////////sendMessage///////////////////////////
//SendMessage::send(Message::getChatId());
//KeyboardButton::sendWP(Message::getChatId(), Message::getText(), "Markdown", false, true, 6380, null);
//ForwardMessage::sendWP(Message::getChatId(), 148918255, true, 6380);
////////////////////KeyboardButton///////////////////////////
//KeyboardButton::setColumn(2);
//KeyboardButton::addKbButton("1");
//KeyboardButton::addKbButton("2");
//KeyboardButton::addKbButton("3");
//KeyboardButton::addKbButton("4");
//KeyboardButton::send($qq);
//KeyboardButton::sendWP(Message::getChatId(), Message::getText(), "Markdown", false, true, null);
////////////////////InlineKeyboardButton///////////////////////////
//InlineKeyboardButton::setColumn(2);
//InlineKeyboardButton::addInlButtonWP("1","1clbc","ya.ru", null, null, null);
//InlineKeyboardButton::addInlButton("2","2clbc");
//InlineKeyboardButton::addInlButton("3","2clbc");
//InlineKeyboardButton::addInlButton("4","2clbc");
//InlineKeyboardButton::send("мяу инл");
//InlineKeyboardButton::sendWP(Message::getChatId(), Message::getText(), "Markdown", false, true, null);
//https://api.telegram.org/bot457726276:AAFsAs3GN3H-6S8NffU7SesK10HUc8m-9IE/setWebhook?url=https://dnup.ru/TelegaBot/core.php

?>
<?php

class Methods {
	static protected $token = "null";
	static protected $method = "null";
	static protected $param = "null";
	
	static function send(){
	    
	    function __construct() {
        $this->token = getenv('TOKEN');
        }
	    
	    $url ='';
		//self::$token = getenv('TOKEN');
		//self::$token = DefaultSettings::getToken();
		
		$token = self::$token;
		$method = self::$method;
		$param = self::$param;
		
		$param = array_filter($param, 'trim'); 											// удаляет пустые - (null)
		foreach ($param as $key => $val ) {
			$url .= "$key=$val&";
		}
		$url = substr($url,0,-1);
		
		$url = "https://api.telegram.org/bot$token/$method?$url";
		@$get = file_get_contents($url); 												// отправка на сервер
		
		return json_decode($get,true); 													// вернет ответ сервера в массиве
	}
}

class SendMessage extends Methods {														//обычная отправка сообщения
	static function send($text = null){
		self::$method = "sendMessage";
		$chat_id = Message::getChatId();
		self::$param = array("chat_id"=>$chat_id,"text"=>$text);
		parent::send();
	}
	
	static function sendWP(	$chat_id,$text,$parse_mode,$disable_web_page_preview,
							$disable_notification,$reply_to_message_id){ 			//отправка сообщения с параметрами
		$param = get_defined_vars(); 									//  Возвращает массив всех определенных переменных функции
		
		self::$method = "sendMessage";
		self::$param = $param;
		parent::send();
	}
}

class ForwardMessage extends Methods {												//пересылка сообщения
	
	static function sendWP(	$chat_id,$from_chat_id,$disable_notification,$message_id){
		$param = get_defined_vars(); 									//  Возвращает массив всех определенных переменных функции

		self::$method = "forwardMessage";
		self::$param = $param;
		parent::send();
	}
}

class SendPhoto extends Methods {													//пересылка сообщения
	
	static function sendWP(	$chat_id,$photo,$caption,$parse_mode,$disable_notification,$reply_to_message_id){
		$param = get_defined_vars(); 									//  Возвращает массив всех определенных переменных функции

		self::$method = "SendPhoto";
		self::$param = $param;
		parent::send();
	}
}

trait ButtonLogic {
	public static function columnLogic($btn){
		$column = self::$column;
		if ( $column == 0 ) { self::$btn[0][] = $btn; }
		if ( $column == 1 ) { self::$btn[][0] = $btn; }
		if ( $column == 2 ) {
			$a = true;
			$i = 0;
			$j = 0;
			do{			
				if( !isset(self::$btn[$i][$j]) ) { self::$btn[$i][$j] = $btn; $a = false; }

				if($j == 1) { $i++; $j = $j - 2; }
				$j++;
			}while ( $a );		 
		}
	}
	
	public static function sendLogic($keyboard, $message){
		$keyboard = json_encode($keyboard);
		$chat_id = Message::getChatId();
		$param = array('chat_id'=>$chat_id,"text"=>$message,'reply_markup'=>$keyboard);
		
		self::$method = "sendMessage";		
		self::$param = $param;
		parent::send();
	}
	
	public static function sendLogicWP(	$chat_id, 
										$text, 
										$parse_mode, 
										$disable_web_page_preview, 
										$disable_notification, 
										$reply_to_message_id, 
										$reply_markup){
											
		$param = get_defined_vars(); 									//  Возвращает массив всех определенных переменных функции
		
		self::$method = "sendMessage";
		self::$param = $param;
		parent::send();
	}
}

class KeyboardButton extends Methods {											//клавиатура
	use ButtonLogic;
	static private $btn = array(array());
	static private $resizeKeyboard = true;
	static private $oneTimeKeyboard = false;
	static private $selective = false;
	static private $column = 1;
	
	static function send($message = null){
		$keyboard = array(	"keyboard" => self::$btn,
							"resize_keyboard" => self::$resizeKeyboard, 	// уменьшить размер кнопок
							"one_time_keyboard" => self::$oneTimeKeyboard, 	// скрыть клаву после нажатия		
							"hide_keyboard" => self::$selective
							);
		
		self::sendLogic($keyboard, $message);
	}
	
	static function sendWP(	$chat_id, 
							$text, 
							$parse_mode, 
							$disable_web_page_preview, 
							$disable_notification, 
							$reply_to_message_id){
								
		$keyboard = array(	"keyboard" => self::$btn,
							"resize_keyboard" => self::$resizeKeyboard, 	// уменьшить размер кнопок
							"one_time_keyboard" => self::$oneTimeKeyboard, 	// скрыть клаву после нажатия		
							"hide_keyboard" => self::$selective
							);
		
		$keyboard = json_encode($keyboard);
		self::sendLogicWP(	$chat_id, 
							$text, 
							$parse_mode, 
							$disable_web_page_preview, 
							$disable_notification, 
							$reply_to_message_id,
							$keyboard);
	}
	
	static function addKbButton($btn){
		self::columnLogic($btn);
	}
	
	public static function resizeKeyboard(){ //запретить наследование
		self::$resizeKeyboard = true;
	}
	
	public static function oneTimeKeyboard(){
		self::$oneTimeKeyboard = true;
	}
	
	public static function selective(){
		self::$selective = true;
	}
	
	public static function setColumn($column){
		self::$column = $column;
	}
}

 class InlineKeyboardButton extends Methods {											//клавиатура
	use ButtonLogic;
	static protected $btn = array();
	static protected $column = 1;
	static private $keyboard = array();
	
	static function send($message = null){
		$keyboard = array(
		"inline_keyboard" => self::$btn
		);		
		self::sendLogic($keyboard, $message);
	}
	
	static function sendWP(	$chat_id, 
							$text, 
							$parse_mode, 
							$disable_web_page_preview, 
							$disable_notification, 
							$reply_to_message_id){
		$keyboard = array(
		"inline_keyboard" => self::$btn
		);
		$keyboard = json_encode($keyboard);
		self::sendLogicWP(	$chat_id, 
							$text, 
							$parse_mode, 
							$disable_web_page_preview, 
							$disable_notification, 
							$reply_to_message_id,
							$keyboard);
	}

	static function addInlButton($btn, $callbackData){
		$column = self::$column;
		$btn = array("text"=>$btn, "callback_data"=>$callbackData);
		self::columnLogic($btn);
	}
	
	static function addInlButtonWP(	$text, 
									$callback_data, 
									$url, 
									$switch_inline_query, 
									$switch_inline_query_current_chat, 
									$pay
									){
		$column = self::$column;
		
		$param = get_defined_vars();
		$btn = array_filter($param, 'trim'); 											// удаляет пустые - (null)
		self::columnLogic($btn);
	}
	
	public static function setColumn($column){
		self::$column = $column;
	}
}
?>
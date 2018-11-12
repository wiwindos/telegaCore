<php
class GetDataFromChat {
	
	public static function setData($messageId){
		//self::$messageId = $messageId;
	}
	
	/* public static function getMessageId(){
		//return self::$messageId;
	} */
}

class Message extends GetDataFromChat{
	static protected  $messageId = "null";
	static protected  $date = "null";
	static protected  $text = "null";
	static protected  $fromId = "null";
	static protected  $fromIsBot = "null";
	static protected  $fromFirstName = "null";
	static protected  $fromUserName = "null";
	static protected  $fromLanguageCode = "null";
	static protected  $chatId = "null";
	static protected  $chatFirstName = "null";
	static protected  $chatUsername = "null";
	static protected  $chatType = "null";
	
	public static function setData(	$messageId,
									$date,
									$text,
									$fromId,
									$fromIsBot,
									$fromFirstName,
									$fromUserName,
									$fromLanguageCode,
									$chatId,
									$chatFirstName,
									$chatUsername,
									$chatType ){
		//parent::setData(	$messageId );
		self::$messageId = $messageId;
		self::$date = $date;
		self::$text = $text;
		self::$fromId = $fromId;
		self::$fromIsBot = $fromIsBot;
		self::$fromFirstName = $fromFirstName;
		self::$fromUserName = $fromUserName;
		self::$fromLanguageCode = $fromLanguageCode;
		self::$chatId = $chatId;
		self::$chatFirstName = $chatFirstName;
		self::$chatUsername = $chatUsername;
		self::$chatType = $chatType;	
	}
	public function getMessageId(){
		return self::$messageId;
	}
	public function getDate(){
		return self::$date;
	}
	public function getText(){
		return self::$text;
	}
	public function getFromId(){
		return self::$fromId;
	}
	public function getFromIsBot(){
		return self::$fromIsBot;
	}
	public function getFromFirstName(){
		return self::$fromFirstName;
	}
	public function getFromUserName(){
		return self::$fromUserName;
	}
	public function getFromLanguageCode(){
		return self::$fromLanguageCode;
	}
	public function getChatId(){
		return self::$chatId;
	}
	public function getChatFirstName(){
		return self::$chatFirstName;
	}
	public function getChatUsername(){
		return self::$chatUsername;
	}
	public function getChatType(){
		return self::$chatType;
	}
	public function getAll(){
		return self::$messageId." ".self::$date." ".self::$text." ".self::$fromId." ".self::$fromIsBot." ".self::$fromFirstName." ".self::$fromUserName." ".self::$fromLanguageCode." ".self::$chatId." ".self::$chatFirstName." ".self::$chatUsername." ".self::$chatType;
	}
}

class MessageForwardFrom extends Message{
	static protected  $messageForwardFromId = "null";
	static protected  $messageForwardFromIsBot = "null";
	static protected  $messageForwardFromFirstName = "null";
	static protected  $messageForwardFromUsername = "null";
	static protected  $messageForwardFromLanguageCode = "null";
	
	public static function setData(	$messageForwardFromId,
									$messageForwardFromIsBot,
									$messageForwardFromFirstName,
									$messageForwardFromUsername,
									$messageForwardFromLanguageCode ){
		self::$messageForwardFromId = $messageForwardFromId;
		self::$messageForwardFromIsBot = $messageForwardFromIsBot;
		self::$messageForwardFromFirstName = $messageForwardFromFirstName;
		self::$messageForwardFromUsername = $messageForwardFromUsername;
		self::$messageForwardFromLanguageCode = $messageForwardFromLanguageCode;
	}
	
	public function getMessageForwardFromId(){
		return self::$messageForwardFromId;
	}
	public function getMessageForwardFromIsBot(){
		return self::$messageForwardFromIsBot;
	}
	public function getMessageForwardFromFirstName(){
		return self::$messageForwardFromFirstName;
	}
	public function getMessageForwardFromUsername(){
		return self::$messageForwardFromUsername;
	}
	public function getMessageForwardFromLanguageCode(){
		return self::$messageForwardFromLanguageCode;
	}
	
}

class MessageEntities extends Message{
	static protected  $msgEtsOffset;
	static protected  $msgEtsLength;
	static protected  $msgEtsType;
	
	public static function setData(	$msgEtsOffset,
									$msgEtsLength,
									$msgEtsType){
		self::$msgEtsOffset = $msgEtsOffset;
		self::$msgEtsLength = $msgEtsLength;
		self::$msgEtsType = $msgEtsType;
	}
	
	public function getMsgEtsOffset(){
		return self::$msgEtsOffset;
	}
	public function getMsgEtsLength(){
		return self::$msgEtsLength;
	}
	public function getMsgEtsType(){
		return self::$msgEtsType;
	}	
}

class CallbackQuery extends Message{
	static protected  $callbackQueryId = "null";
	static protected  $callbackQueryChatInstance = "null";
	static protected  $callbackQueryData = "null";
	static protected  $callbackQueryFromId = "null";
	static protected  $callbackQueryFromIsBot = "null";
	static protected  $callbackQueryFromFirstName = "null";
	static protected  $callbackQueryFromUsername = "null";
	
	public static function setData(	$callbackQueryId,
									$callbackQueryChatInstance,
									$callbackQueryData,
									$callbackQueryFromId,
									$callbackQueryFromIsBot,
									$callbackQueryFromFirstName,
									$callbackQueryFromUsername,
									$fromLanguageCode,
									$messageId,
									$date,
									$text,
									$fromId,
									$fromIsBot,
									$fromFirstName,
									$fromUserName,
									$chatId,
									$chatFirstName,
									$chatUsername,
									$chatType ){

		parent::setData(	$messageId,
							$date,
							$text,
							$fromId,
							$fromIsBot,
							$fromFirstName,
							$fromUserName,
							$fromLanguageCode,
							$chatId,
							$chatFirstName,
							$chatUsername,
							$chatType );
		self::$callbackQueryId = $callbackQueryId;
		self::$callbackQueryChatInstance = $callbackQueryChatInstance;
		self::$callbackQueryData = $callbackQueryData;
		self::$callbackQueryFromId = $callbackQueryFromId;
		self::$callbackQueryFromIsBot = $callbackQueryFromIsBot;
		self::$callbackQueryFromFirstName = $callbackQueryFromFirstName;
		self::$callbackQueryFromUsername = $callbackQueryFromUsername;
	}
	
	public function getCallbackQueryId(){
		return self::$callbackQueryId;
	}
	public function getCallbackQueryChatInstance(){
		return self::$callbackQueryChatInstance;
	}
	public function getCallbackQueryData(){
		return self::$callbackQueryData;
	}
	public function getCallbackQueryFromId(){
		return self::$callbackQueryFromId;
	}
	public function getCallbackQueryFromIsBot(){
		return self::$callbackQueryFromIsBot;
	}
	public function getCallbackQueryFromFirstName(){
		return self::$callbackQueryFromFirstName;
	}
	public function getCallbackQueryFromUsername(){
		return self::$callbackQueryFromUsername;
	}
	
 	public function getAll(){
		return self::$messageId." ".self::$date." ".self::$text." ".self::$fromId." ".self::$fromIsBot." ".self::$fromFirstName." ".self::$fromUserName." ".self::$fromLanguageCode." ".self::$chatId." ".self::$chatFirstName." ".self::$chatUsername." ".self::$chatType." ".self::$callbackQueryId." ".self::$callbackQueryChatInstance." ".self::$callbackQueryData." ".self::$callbackQueryFromId." ".self::$callbackQueryFromIsBot." ".self::$callbackQueryFromFirstName." ".self::$callbackQueryFromUsername;
	} 
}

class webHook {
	public static function getData(){
		$data = file_get_contents("php://input");
		if ( empty($data) ) { return null; }		//нет входных данных
		
		$data = json_decode($data,true);			//декодирование данных
		if ( isset($data[message]) ){				//сообщение
			Message::setData (	$data[message][message_id],
								$data[message]['date'],
								$data[message][text],
								$data[message][from][id],
								$data[message][from][is_bot],
								$data[message][from][first_name],
								$data[message][from][username],
								$data[message][from][language_code],
								$data[message][chat][id],
								$data[message][chat][first_name],
								$data[message][chat][username],
								$data[message][chat][type] );
								
			if ( isset($data[message][forward_from]) ){
				MessageForwardFrom::setData (	$data[message][forward_from][id],
												$data[message][forward_from][is_bot],
												$data[message][forward_from][first_name],
												$data[message][forward_from][username],
												$data[message][forward_from][language_code] );
			}
			if ( isset($data[message][entities]) ){
				MessageEntities::setData (	$data[message][entities][0][offset],
											$data[message][entities][0][length],
											$data[message][entities][0][type] );
			}
		}
		if ( isset($data[callback_query]) ){		//инлайн объект
			CallbackQuery::setData (	$data[callback_query][id],
								$data[callback_query][chat_instance],
								$data[callback_query][data],
								$data[callback_query][from][id],
								$data[callback_query][from][is_bot],
								$data[callback_query][from][first_name],
								$data[callback_query][from][username],
								$data[callback_query][from][language_code],
								$data[callback_query][message][message_id],
								$data[callback_query][message]['date'],
								$data[callback_query][message][text],
								$data[callback_query][message][from][id],
								$data[callback_query][message][from][is_bot],
								$data[callback_query][message][from][first_name],
								$data[callback_query][message][from][username],
								$data[callback_query][message][chat][id],
								$data[callback_query][message][chat][first_name],
								$data[callback_query][message][chat][username],
								$data[callback_query][message][chat][type] );
		}
	}
}

class Logs {
	public static function setLog(){
		$time = date('G:i:s, F j, Y');
		$date = date('F_j,Y');
		$file = './logs/'.$date.'.log';
		$datas = file_get_contents("php://input");

		if( strlen($datas) > 10 ) {
			$handle = fopen($file, "a");
			$fwrite = fwrite($handle, $data."|\n");
			fclose($handle);
		}
	}
}
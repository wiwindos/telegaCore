<?php
class GetToken{
    static $token = null;

    function __construct() {
        self::$token = getenv('TOKEN');
    }
    
    function token(){
        return self::$token;
    }
}

final class DefaultSettings {
    
 /*   static protected $token = null;

    function __construct() {
        $this->token = getenv('TOKEN');
    }*/
    
    //https://api.telegram.org/bot410244451:AAGrJ83kT1E0ohx_lgPmwM/setWebhook?url=https://xxx.xx/bot/.php
    //public $token = getenv('TOKEN');
  //  static protected $token = $_ENV['TOKEN'];
	//static protected $token = "";						//токен
	
	//static protected $user = 'user';														//подключение к бд
	//static protected $password = 'password';
	//static protected $database = 'database';

	function getToken(){
		return self::$token;
	}
	
	function connectDB(){
		if( !isset($mysql) ) { 																		// проверяем подключение
			$mysql = new mysqli('localhost',self::$user,self::$password,self::$database); 			//var_dump($mysql);
			if ( mysqli_connect_errno($mysql) ) { 													// Поключение к БД
				return "<!-- Не удалось подключиться к БД " . mysqli_connect_error() . "--> \r\n";
			} else {
				$mysql->set_charset("utf8");
				return $mysql;
			}
		}
	}
}

?>
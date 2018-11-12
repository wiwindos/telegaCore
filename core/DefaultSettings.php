<?
final class DefaultSettings {
    //https://api.telegram.org/bot410244451:AAGrJ83kT1E0ohx_lgLPmw4OY_QjkIM/setWebhook?url=https://xxx.xx/bot/.php
    //static protected $token = getenv('TOKEN');
    static protected $token = $_ENV['TOKEN'];
	static protected $token = "";						//токен
	
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
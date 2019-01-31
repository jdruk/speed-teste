<?php
	$db_name = "mkradius";
	$mysql_username = "root";
	$mysql_password = "vertrigo";
	$server_name = "192.168.1.240:3306";
	$conn = mysqli_connect($server_name, $mysql_username, $mysql_password, $db_name);


	define("TOKEN", 'a0910677-dd0a-4bf1-84ef-bc9a8f148a8c');
	define('TOKEN_ERROR', '666');
	

	define('SUCESS', 0);
	define('LOGIN_NOT_INFORMED', 1);
	define('UNEXISTENT_USER', 2);
?>
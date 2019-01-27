<?php
	$db_name = "base0";
	$mysql_username = "root";
	$mysql_password = "vertrigo";
	$server_name = "localhost";
	$conn = mysqli_connect($server_name, $mysql_username, $mysql_password, $db_name);
	
	if($conn){
		echo "sucesso";
	}else {
		echo "falha";
	}
?>

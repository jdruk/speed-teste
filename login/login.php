<?php
	require "conn.php";

	$user_name = "j@email.com";
	$user_pass = "123456";

	$mysql_qery = "select * from login where email like '$user_name' and senha like '$user_pass' ";

	$result = mysqli_query($conn, $mysql_qery);

	if(mysqli_num_rows($result) > 0){
		echo "<br> login sucesso";
	} else {
		echo "<br> login falho";
	}
?>


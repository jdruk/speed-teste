<?php
	echo "aqui";
	require "conn.php";

	//header('Content-Type: application/json; charset=utf-8');

	$user_name = $_POST["user_name"];
	$user_pass = $_POST["user_password"];


	$query = "select * from sis_central";
	//$query = "select * from sis_cliente where login like '$user_name' and senha like '$user_pass' ";

	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);


	switch ($row["fsenha"]) {
	 	case 'senha':
	 		// login cpf
	 		$query = "select * from sis_cliente where login like '$user_name' and senha like '$user_pass' ";
	 		break;
	 	case 'lcpf'
	 		// login senha
	 		$query = "select * from sis_cliente where login like '$user_name' and cpf_cnpj like '$user_pass' ";
	 		break;
	 	case 'cpfs':
	 		// login cpf
	 		$query = "select * from sis_cliente where cpf_cnpj like '$user_name' and senha like '$user_pass' ";
	 		break;
	 	case 'cpf'
	 		// cpf 
	 		$query = "select * from sis_cliente where cpf_cnpj like '$user_name' ";
	 		break;
	 	default:
	 		# code...
	 		break;
	 };

	$result = mysqli_query($conn, $query);

	echo $result;
	echo $query;

	if(mysqli_num_rows($result) > 0){
		$response =  array('error' => 0 );
		echo json_encode($response);  
	} else {
		$response =  array('error' => 1);
		echo json_encode($response); 
	}
?>


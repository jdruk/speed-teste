<?php

	require "conn.php";

	header('Content-Type: application/json; charset=utf-8');

	function check_type_login(){
		global $conn;

		$query = "select * from sis_central";
	
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);

		return $row["fsenha"];
	}

	function select_query($type_login, $user_name, $user_pass){
		$query = "";
		switch ($type_login) {
	 	case 'senha':
	 		// login cpf
	 		$query = "select * from sis_cliente where login like '$user_name' and senha like '$user_pass' ";
	 		break;
	 	case 'lcpf':
	 		// login senha
	 		$query = "select * from sis_cliente where login like '$user_name' and cpf_cnpj like '$user_pass' ";
	 		break;
	 	case 'cpfs':
	 		// login cpf
	 		$query = "select * from sis_cliente where cpf_cnpj like '$user_name' and senha like '$user_pass' ";
	 		break;
	 	case 'cpf':
	 		// cpf 
	 		$query = "select * from sis_cliente where cpf_cnpj like '$user_name' ";
	 		break;
	 	};

	 	return $query;
	}

	function response_user($result){
		if($result == null || mysqli_num_rows($result) <= 0){
			return array('error' => UNEXISTENT_USER );
			//return "falha";
		}

		$row = mysqli_fetch_assoc($result);
		
		$response -> error = SUCESS;
		$response -> name = $row['nome'];
		
		return $response;
	}

	function response_for($user_name, $user_password){
		$query = select_query(check_type_login(),$user_name, $user_password);
		$result = execute_query($query);

		//echo json_encode(response_user($result));
		echo (response_user($result));
	}

	function execute_query($query){
		global $conn;
		if($query == ""){
			return null;
		}
		return mysqli_query($conn, $query);
	}

	function init_components(){
		if(isset($_POST["user_name"]) && isset($_POST["user_password"])){
			$user_name = $_POST["user_name"];
			$user_password = $_POST["user_password"];

			response_for($user_name, $user_password);

		} else {
			echo json_encode(array('error' => LOGIN_NOT_INFORMED));
		}
	}
	

	function main(){
		init_components();
	}
	
	main();
?>


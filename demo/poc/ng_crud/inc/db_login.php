<?php
	require_once 'db_connect.php';
	$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
	$username = $request->username;
	$password = $request->password;
	$query = $conn->query("SELECT * FROM `member` WHERE `username` = '$username' && `password` = '$password'") or die(mysqli_error($conn));
	$valid = $query->num_rows;
	$fetch = $query->fetch_array();
	if($valid > 0){
		session_start();
		$_SESSION['mem_id'] = $fetch['mem_id'];
		echo "true";
	}else{
		echo "false";
	}
?>
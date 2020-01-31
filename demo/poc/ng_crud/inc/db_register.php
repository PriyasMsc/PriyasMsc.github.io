<?php
	require_once 'db_connect.php';
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$username = $request->username;
	$password = $request->password;
	$firstname = $request->firstname;
	$lastname = $request->lastname;
	$conn->query("INSERT INTO `member` (username, password, firstname, lastname, flag) VALUES('$username', '$password', '$firstname', '$lastname', '1')") or die(mysqli_error($conn));
?>
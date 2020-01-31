<?php
	require_once 'db_connect.php';
	$data = json_decode(file_get_contents("php://input"));
	print_r($data); exit;
	$mem_id = $data->mem_id;
	echo "DELETE FROM `member` WHERE `mem_id` = $mem_id"; exit; 
	$query = $conn->query("DELETE FROM `member` WHERE `mem_id` = $mem_id") or die(mysqli_error($conn));
?>
<?php
	define('db_host', 'localhost');
	define('db_user', '860030');
	define('db_pass', 'ramdeveloper');
	define('db_name', '860030');
 
	$conn = new mysqli(db_host, db_user, db_pass, db_name);
	if(!$conn){
		die("Fatal Error: Can't connect to database");
	} else {
		//echo "connected";
	}
?>
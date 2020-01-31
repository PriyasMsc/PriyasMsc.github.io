<?php
	session_start();
	session_unset(mem_id);
	header("location:index.php");
?>
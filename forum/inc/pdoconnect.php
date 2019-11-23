<?php 
	//error_reporting(0); 
	$connect = new PDO("mysql:host=localhost; dbname= register", "root", "");

	if ($connect) {
		echo "connected";
	}
?>
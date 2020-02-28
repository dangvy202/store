<?php
	$dsn="mysql:host=localhost;dbname=php1";
	$username="root";
	$password="";
	$conn=new PDO($dsn,$username,$password) or die("CANNOT CONNECT");
?>
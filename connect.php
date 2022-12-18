<?php

	$hostname="localhost";
	$username="id18920131_nam";
	$password="Nam31082001@";
	$databasename="id18920131_appmusic";

	$conn = mysqli_connect($hostname,$username,$password,$databasename);
	mysqli_query($conn,"SET NAMES 'utf8'");
?>
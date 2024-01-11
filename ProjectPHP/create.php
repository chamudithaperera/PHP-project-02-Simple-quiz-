<?php
	$servername="localhost";
	$username="root"; #username
	$password=""; #password
	
	//create connection
	$conn = mysqli_connect($servername, $username, $password);
	
	//check connection
	if(!$conn)
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	
	//create database
	$sql = "CREATE DATABASE quizdb";
	
	if(mysqli_query($conn, $sql))
	{
		echo "Database created successfully";
	}
	else
	{
		echo "Error creating database: " . mysqli_error($conn);
	}
	
	mysqli_close($conn);
?>
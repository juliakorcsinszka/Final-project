<?php

session_start();
	
	include_once 'db.php';


	$userEmail = $_POST['email'];
	


	$emailQuery = "SELECT * FROM User WHERE email = '$userEmail'";
	$result =  $connection->query($emailQuery);


	if ($result->num_rows > 0){
		//echo "Email taken";
		
	}else{
		//echo"Email is fine";
		header("Location: ../pages/login.php");
	}





mysqli_close($connection);


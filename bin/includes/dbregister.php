<?php

//Only run script if user has clicked the CREATE button
if (isset($_POST['create'])) {
	include_once 'db.php';




	




	$name = mysqli_real_escape_string($connection, $_POST['name']); 
	$email = mysqli_real_escape_string($connection, $_POST['userEmail']); 
	$password = mysqli_real_escape_string($connection, $_POST['userPassword']); 
	

	// * * * * Error handlers  * * * *

	//Check for empty fields
	if(empty($name) || empty($password) || empty($email)){
		header("Location: ../pages/register.php?");
	} else{
		//Check if characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $name)) {
			header("Location: ../pages/register.php");
		}else{
			//Check if email is valid
			if (!filter_var($email. FILTER_VALIDATE_EMAIL)) {
				header("Location: ../pages/register.php");
			}else{
				//Check if email already exists in database
				$emailQuery = "SELECT * FROM User WHERE email = '$email'";
				$result =  $connection->query($emailQuery);

				if ($result->num_rows > 0){
					header("Location: ../pages/register.php");
				} else{
					//Hashing the password
					$hashedPwd = password_hash($userPassword, PASSWORD_DEFAULT);
					//Insert the user into the database
					$insertSql = "INSERT INTO User (id, username, email, password) VALUES ('12', ".$_POST['name'].", '".$_POST['userEmail']."', '".$_POST['userPassword']."');";
					mysqli_query($connection, $insertSql);
					print("here");
				}
			}
		}
	}


}else{ //if user did not press the CREATE and tried to access through URL
	header("Location: ../pages/register.php");
	exit();
}
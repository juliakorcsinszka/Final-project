<?php

session_start();

$errorMessage = "";

//Only run script if user has clicked the CREATE button
if (isset($_POST['create'])) {
	include_once 'db.php';


	$name = mysqli_real_escape_string($connection, $_POST['name']); 
	$email = mysqli_real_escape_string($connection, $_POST['userEmail']); 
	$password = mysqli_real_escape_string($connection, $_POST['userPassword']); 
	$secondPwdEntry = mysqli_real_escape_string($connection, $_POST['passwordReentry']); 

	// * * * * Error handlers  * * * *

	//Check for empty fields 
	if(empty($name) || empty($password) || empty($email) || empty($secondPwdEntry)){
		header("Location: ../pages/register.php");
	} else{
		//Check if characters are valid for name
		if (!preg_match("/^[a-z A-Z]*$/", $name)) {
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
				}else{
				//Check if both entries for password are the same
					if (!($password==$secondPwdEntry)) {
					header("Location: ../pages/register.php");
					}else{
						//check field length
						if (strlen($password)<6 || strlen($password)>30 || strlen($name)>40 || strlen($email)>40) {
							header("Location: ../pages/register.php");
						}else{
							//Hashing the password
							$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
							//Insert the user into the database
							$insertSql = "INSERT INTO User (username, email, password) VALUES ('$name', '".$_POST['userEmail']."', '$hashedPwd');";
							mysqli_query($connection, $insertSql);

							//login the user here (superglobal session)
							$nameToSet = mysqli_fetch_row($connection->query("SELECT username FROM User WHERE email = '$email'")); 
							$idToSet = mysqli_fetch_row($connection->query("SELECT id FROM User WHERE email = '$email'"));  
							$_SESSION['userID'] =  $idToSet[0];
							//id - from inside the db
							$_SESSION['userName'] = $nameToSet[0];  
							// //assign the email
							$_SESSION['userEmail'] = $email;

						


							header("Location: ../profilePages/mxGraphAPI/examples/editors/home.php");

							exit();
						}
						
					}	
				}				
			}
		}
	}



}else{ //if user did not press the CREATE and tried to access through URL
	header("Location: ../pages/register.php");
	exit();
}




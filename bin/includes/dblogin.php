<?php
//start the website session
session_start();


//Only run script if user has clicked the LOGIN button
if (isset($_POST['login'])) {
	include 'db.php';
	
	$email = mysqli_real_escape_string($connection, $_POST['userEmail']); 
	$password = mysqli_real_escape_string($connection, $_POST['userPassword']); 


	// * * * * Error handlers  * * * *

	//Check for empty fields 
	if(empty($password) || empty($email)){
		header("Location: ../pages/login.php");
		exit();
	} else{
		//Check if email is valid
		if (!filter_var($email. FILTER_VALIDATE_EMAIL)) {
			header("Location: ../pages/login.php");
		}else{
			//Check if email exists in database
			$emailQuery = "SELECT * FROM User WHERE email= '$email'";
			$result =  $connection->query($emailQuery);
			//if no rows for this email
			if ($result->num_rows <= 0) {
				header("Location: ../pages/login.php");
			}else{
				//get hashed password and check if password matches the db
				$passwordQuery = "SELECT password FROM User WHERE email = '$email'";
				$result =  $connection->query($passwordQuery);
				$passwordQueryResult = mysqli_fetch_row($result);
				//if passwords match
				if (password_verify ($_POST['userPassword'], $passwordQueryResult[0])){

					//login the user here (superglobal session)
					$nameToSet = mysqli_fetch_row($connection->query("SELECT username FROM User WHERE email = '$email'")); 
					$idToSet = mysqli_fetch_row($connection->query("SELECT id FROM User WHERE email = '$email'"));  
					$_SESSION['userID'] =  $idToSet[0];
					//id - from inside the db
					$_SESSION['userName'] = $nameToSet[0];
					//assign the email
					$_SESSION['userEmail'] = $email;

					header("Location: ../profilePages/mxGraphAPI/examples/editors/home.php");

					exit();

				}else{
					header("Location: ../pages/login.php");
				}
			}				
		}
	}



}else{ //if user did not press the LOGIN and tried to access through URL
	header("Location: ../pages/login.php");
	exit();
}




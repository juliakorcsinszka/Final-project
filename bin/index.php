<?php
	session_start();
?>

<! DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"> <!--why?-->

	<head>
		<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet'>
		<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1" /><!--character set used-->
		<meta name="description" content="Home page for the ER diagram collaboration site" />
		<meta name="author" content="Julia Korcsinszka" />
		<title>Welcome to ER docs</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>

	</head>

	<body> 

	<?php

	if (isset($_SESSION['userID'])) {
      	echo '<div class="page">
	            <div class="header">
	                <div class="dropDown">
	                  <p class="dropbtn"> '. $_SESSION['userName'] . '&emsp;<i class="fa fa-caret-down"></i> </p>
	                    <div class="dropDownContent">
	                      <a href="#home">Documents </a>
	                      <a href="#about">New (0) </a>
	                      <a href="includes/dblogout.php">
	                        <input method="POST" name="submit" type="submit" value="Log out "></input>
	                      </a>
	                    </div>    
	                </div>
	                <img src="css/images/user-icon.png" style="float:right" class="logo" alt="User">  
	                <a href="../index.html"> 
	                  <img src="css/images/logo.png" class="logo" alt="Logo">
	                </a>
	            </div>';
    }else{

    	echo '<div class="page">
				<div class="header"> 
					<a href="pages/register.php" class="headerButton">Sign Up</a>
		  			<a href="pages/login.php" class="headerButton">Log In</a>
		  			<a href="index.php"> 
		        		<img src="css/images/logo.png" class="logo" alt="Logo">
		     		 </a>
		  		</div>';
    }


	?>
	

		<div class="body">
			<div id="homepage">
				<p> Welcome to <span> ER docs </span> </p>
			</div>
			<div id="slogan">
				<p>Entity relationship diagrams done right</p>
			</div>
			<div id="homeAbout">
				<p>ER docs is an online tool for individual and collabprative design of entity relationship diagrams. With its AI features even beginners can learn how to design entity relationship diagrams, whereas its collaborative features support communication and project management. ER docs allows you to not just create diagrams but to export them and use them offline.</p>
			</div>
		</div>
		
		<div class="footer">
			<p>Julia Korcsinszka 2018 <br/> University of Liverpool, Department of Computer Science</p>
		</div>
	</div>
			

	</body>
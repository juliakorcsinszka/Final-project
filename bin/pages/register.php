<?php
//start the website session
session_start();

?>


<! DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"> <!--why?-->

  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet'>
    <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1" /><!--character set used-->
    <meta name="description" content="Home page for the ER diagram collaboration site" />
    <meta name="author" content="Julia Korcsinszka" />
    <title>ER docs</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>
  </head>

  <body>
  <div class="page">
    <div class="header"> 
      <a href="register.php" class="headerButton">Sign Up</a>
      <a href="login.php" class="headerButton">Log In</a>
      <a href="../index.php"> 
        <img src="../css/images/logo.png" class="logo" alt="Logo">
      </a>
    </div>

    </script>

    <div class="body">
      <div class="form">
        <form action="../includes/dbregister.php" method="POST" name="registerForm">
          <input class="field" type="text" name = "name" placeholder="name"/>
          <input class="field" type="password" name = "userPassword" placeholder="password"/>
          <input class="field" type="password" name = "passwordReentry" placeholder="repeat password"/>
          <input class="field" type="text" name = "userEmail" placeholder="email" />

          <div>
            <label id="checkboxLabel">
                <input type="checkbox" name="terms" id="checkbox"/>  &emsp;I accept  
                  <a href="" onclick="termsAlert()"> Terms and Conditions</a>  
            </label>
          </div>

          <button name="create" onclick="registerValidation(document.registerForm.userEmail, document.registerForm.name, document.registerForm.userPassword, document.registerForm.passwordReentry)">create
          </button>
        </form>

      </div> <!-- "form" div -->
    </div> <!-- "body div"-->

   <div class="footer">
      <p>Julia Korcsinszka 2018 <br/> University of Liverpool, Department of Computer Science</p>
    </div>
  </div> 
  <script type="text/javascript" src="../js/registerValidation.js"></script>  
  </body>
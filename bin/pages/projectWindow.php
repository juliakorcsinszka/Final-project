<?php
  session_start();

?>

<! DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"> <!--why?-->

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--fa-caret character-->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet'>
    <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1" /><!--character set used-->
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>
    <meta name="description" content="Home page for the ER diagram collaboration site" />
    <meta name="author" content="Julia Korcsinszka" />
    <title>ER docs</title>

</head>

<body>

  <?php
    if (isset($_SESSION['userID'])) {
      echo '<div class="page">
              <div class="header">
                <div class="dropDown">
                  <p class="dropbtn">Namegreighreoighrmak <i class="fa fa-caret-down"></i> </p>
                    <div class="dropDownContent">
                      <a href="#home">Documents </a>
                      <a href="#about">New (0) </a>
                      <a href="../includes/dblogout.php">
                        <input method="POST" name="submit" type="submit" value="Log out "></input>
                      </a>
                    </div>    
                </div>
                <img src="../css/images/user-icon.png" style="float:right" class="logo" alt="User">  
                <a href="../index.html"> 
                  <img src="../css/images/logo.png" class="logo" alt="Logo">
                </a>
              </div>

              <div class="body">
              </div>

              <div class="footer">
                <p>Julia Korcsinszka 2018 <br/> University of Liverpool, Department of Computer Science</p>
              </div>
            </div>';
    }else{
      //redirect to login page
      header("Location: ../pages/login.php");
    }
  ?>

  
     

</body>
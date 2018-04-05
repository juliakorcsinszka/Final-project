<! DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"> <!--why?-->

  <head>
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
      <a href="../index.html"> 
        <img src="../css/images/logo.png" class="logo" alt="Logo">
      </a>
    </div>

    <div class="body">
      <div class="form">
        <form class="registerForm" action="../includes/dbregister.php" method="POST">
          <input type="text" name = "name" placeholder="name"/>
          <input type="password" name = "userPassword" placeholder="password"/>
          <input type="text" name = "userEmail" placeholder="email address"/>
          <button name="create">create</button>
          <!--   <p class="message">Already registered? <a href="#">Sign In</a></p>   --> 
        </form>
      </div> <!-- "form" div -->
    </div> <!-- "body div"-->

   <div class="footer">
      <p>Julia Korcsinszka 2018 <br/> University of Liverpool, Department of Computer Science</p>
    </div>
  </div>
      

  </body>
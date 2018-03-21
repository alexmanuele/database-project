<?php
if(!session_id())
  session_start();
 ?>
<!DOCTYPE html>
<html>
 <head>
   <title>Bhakti yoga. Wellness your way.</title>
   <link href="style.css" type="text/css" rel="stylesheet"/>
   <link rel="stylesheet" type="text/css"
     href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
   <script type="text/javascript" src="script.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" type="text/css" href="resources/jquery-ui-1.12.1.custom/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
$( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
 <body>

   <div class="header"> <!-- title header -->
     <div class="container">
      <!--  <img src="resources/logo.png"> -->
      <i class="fa fa-fire fa-lg"></i>
        <span>Bhakti Yoga: Wellness by the Seaside.</span>
     </div>
    </div>
    <div class="banner"> <!--banner -->
      <div class="container">
        <div class="headline">
          <h4>BHAKTI</h4>
          <h1>Unlock your full potential.</h1>
        </div>
      </div>
    </div> <!-- end of banner -->

    <div id="tabs">
      <ul>
        <li><a href="#tabs-1">Register</a></li>
        <li><a href="#tabs-2">Members</a></li>
        <li><a href="#tabs-3">Faculty</a></li>
      </ul>
     <div id="tabs-1">
       First name:<br>
     <form id="register" method= 'post'>
      <input type="text" name="firstname" required><br>
      Last name:<br>
      <input type="text" name="lastname" required><br>
      Username: <br>
      <input type="text" name="username" required><br>
      Select a Membership Type: <br>
      <select name="membership" required>
        <option value="">Select...</option>
        <option value="1">Casual</option>
        <option value="2">Committed</option>
        <option value="3">Unlimited</option>
      </select><br>
      Password: <br>
      <input type="text" name="signuppassword" required><br><br>
      <input type="submit" value="Submit" name="submit">
      <?php include 'register.php';?>
     </form>
     </div>
     <div id="tabs-2">
       <h2>Already a member? Log in here.</h2>
       <form id='login' method='post'>
         Username:<br>
         <input type="text" name="membername" required><br>
         Password:<br>
         <input type="text" name="studentpassword" required><br><br>
         <input type="submit" value="Login" name="login">
         <?php include 'studentLogin.php';?>
        </form>
     </div>
     <div id="tabs-3">
       <h2>Faculty Login</h2>
       <form id='stafflogin' method='post'>
         Username:<br>
         <input type="text" name="staffname" required><br>
         Password:<br>
         <input type="text" name="staffpassword" required><br><br>
         Sign in as:<br>
         <select name="stafftype" required>
           <option value="">Select...</option>
           <option value="1">Teacher</option>
           <option value="2">Management</option>
         </select>
         <input type="submit" value="Login" name="stafflogin">
         <?php include 'faculty_login.php';?>
        </form>
     </div>
    </div>
    <footer>
      <nav>
        <ul class="container">
          <li><a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook fa-lg"></i></a></li>
          <li><a href="https://www.twitter.com" target="_blank"><i class="fa fa-twitter fa-lg"></i></a></li>
          <li><a href="https://www.instagram.com" target="_blank"><i class="fa fa-instagram fa-lg"></i></a></li>
        <ul>
      </nav>
    </footer>

 </body>
</html>

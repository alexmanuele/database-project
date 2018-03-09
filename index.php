<!DOCTYPE html>
<html>
 <head>
   <title>Duncan University. Imagine.</title>
   <link href="style.css" type="text/css" rel="stylesheet"/>
   <script type="text/javascript" src="script.js"></script>
 <body>

   <div class="header"> <!-- title header -->
     <div class="container">
      <!--  <img src="resources/logo.png"> -->
        <span>DUNCAN UNIVERSITY: Study by the Seaside.</span>
     </div>
    </div>
    <div class="banner"> <!--banner -->
      <div class="container">
        <div class="headline">
          <h4>UNIVERSITY</h4>
          <h1>Unlock your full potential.</h1>
        </div>
      </div>
    </div> <!-- end of banner -->
    <nav>
      <div class="container">
        <button class="tablinks" onclick="openSection('Register', this, 'cadetblue')">Register</button>
        <button class="tablinks" id="defaultOpen" onclick="openSection('Student', this, 'cadetblue')" >Student Login</button>
        <button class="tablinks" onclick="openSection('Faculty', this, 'cadetblue')">Faculty Login</button>
      </div>
    </nav>
  <div class="form-space">
  <div id='Register' class="tabcontent"> <!--originally class form-container-->
   <h2>Enrol Today!</h2>
   <form id='signup-form'  method='post'> <!--use post instead of get-->
     First name:<br>
     <input type="text" name="firstname"><br>
     Middle Name (optional):<br>
     <input type="text" name="middlename"><br>
     Last name:<br>
     <input type="text" name="lastname"><br>
     Password: <br>
     <input type="text" name="signuppassword"><br><br>

     <input type="submit" value="Submit" name="submit">
     <?php include 'register.php';?>
   </form>
  </div>

  <div id='Student' class="tabcontent">
    <h2>Already enrolled? Log in here.</h2>
    <form id='login' method='post'>
      Student Number:<br>
      <input type="text" name="studentid"><br>
      Password:<br>
      <input type="text" name="studentpassword"><br><br>
      <input type="submit" value="Login" name="login">
      <?php include 'studentLogin.php';?>
    </form>
  </div>
</div>
<div id='Faculty' class="tabcontent">
  <h2>Coming Soon.</h2>
</div>
 <footer>
    <div class="container">
          Established in 1658.
    </div>
 </footer>
 </body>

</html>

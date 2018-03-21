<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
 <head>
   <title>Bhakti: Wellness your way.</title>
   <link href="style.css" type="text/css" rel="stylesheet"/>
   <link rel="stylesheet" type="text/css"
     href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" type="text/css" href="resources/jquery-ui-1.12.1.custom/jquery-ui.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
   <script>
   $( function() {
     $( "#tabs" ).tabs();
     } );
   </script>
   <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
 </head>
 <body>
   <div class="header"> <!-- title header -->
     <div class="container">
      <!--  <img src="resources/logo.png"> -->
        <span>Welcome to the Management page. Your business, at your fingertips.</span>
     </div>
    </div>
    <div class="banner"> <!--banner -->
      <div class="container">
        <div class="headline">
          <h4>Welcome back,</h4>
          <h1><?php echo $_SESSION["firstname"]?></h1>
        </div>
      </div>
    </div> <!-- end of banner -->
  <div id="tabs">
      <ul>
        <li><a href="#tabs-1">Manage Classes</a></li>
        <li><a href="#tabs-2">Statistics</a></li>
        <li><a href="#tabs-3">Detailed Reports</a></li>
      </ul>
      <div id="tabs-1">
       <div>
        <h4>See the schedule of any date.</h4>
        <form id="schedule" method="post">
          Date: <input type="text" id="datepicker" name="date">
          <br><br>
          <input type="submit" value="See Schedule" name="sched">
          <br><br>
          <?php include 'schedule.php';?>
        </form>
       </div>
      </div>
      <div id="tabs-2">
        <h4>Keep tabs on your business.</h4>
        <p> Make use of our database to see useful information about classes and teachers.</p>
        <form id="class-info" method="post">
          <select name="statistic">
            <option value="">Show me...</option>
            <option value="1">Most popular</option>
            <option value="2">Least popular</option>
          </select>
          <select name="subject">
            <option value="">About..</option>
            <option value="1">Class Type</option>
            <option value="2">Day of the Week</option>
            <option value="3">Time Block</option>
            <option value="4">Teacher</option>
            <option value="5">Month for new members</option>
          </select><br><br>
          <input type="submit" value="Show Me!" name="submit">
        </form>
      </div>
      <div id="tabs-3">
        <h4>Dive in to the details.</h4>
        <p>Our system provides detailed reports so that you can run the best version of your business.</p>
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

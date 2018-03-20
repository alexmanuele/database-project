<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
 <head>
   <title>Bhakti: Wellness your way.</title>
   <link href="style.css" type="text/css" rel="stylesheet"/>
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
        <span>Welcome to the Teacher page. Your shedule, at your fingertips.</span>
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
      </ul>
      <div id="tabs-1">
        <div>
         <h4>Choose a date to see the schedule.</h4>
         <form id="schedule" method="post">
           Date: <input type="text" id="datepicker" name="date">
           <br><br>
           <input type="submit" value="See Schedule" name="sched">
           <?php include 'schedule.php';?>
         </form>
        </div>

      <div id="tabs-2">
        <h4>Be the best teacher you can be.</h4>
        <p> Make use of our detailed reports to see information about your classes.</p>
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
          </select><br><br>
          <input type="submit" value="Show Me!" name="submit">
        </form>
      </div>
  </div>
  <footer>
     <div class="container">
           Established in 1658.
     </div>
  </footer>
 </body>
</html>

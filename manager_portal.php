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
     $( "#datepicker" ).datepicker({
         dateFormat: 'yy-mm-dd'
         });
   } );
  $( function() {
    $( "#datepicker2" ).datepicker({
        dateFormat: 'yy-mm-dd'
        });
  } );
  </script>
 </head>
 <body>
   <div class="header"> <!-- title header -->
     <div class="container">
      <!--  <img src="resources/logo.png"> -->
        <i class="fa fa-fire fa-lg"></i>
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
        <li><a href="#tabs-2">Manage Staff</a></li>
        <li><a href="#tabs-3">Statistics</a></li>
        <li><a href="#tabs-4">Detailed Reports</a></li>
      </ul>
      <div id="tabs-1">
       <div class="form-container">
       <div>
        <h4>See the schedule of any date.</h4>
        <form id="schedule" method="post">
          <input type="text" id="datepicker" name="date">
          <br><br>
          <input type="submit" value="See Schedule" name="sched">
          <br><br>
          <?php include 'schedule.php';?>
        </form>
       </div>
       <div>
         <h4>Add or remove classes.</h4>
         You only need to select a class type if adding a class.
         <form id="class-add" method="post">
           <input type="text" id="datepicker2" name="date">
           <br><br>
           <select name="class-time" method="post">
             <option value="">Choose a time..</option>
             <option value="1">6:00am-8:30am</option>
             <option value="2">9:00am-10:30am</option>
             <option value="3">11:00am-12:30pm</option>
             <option value="4">1:00pm-2:30pm</option>
             <option value="5">3:00pm-4:30pm</option>
           </select>
           <?php include 'class_selection.php' ?>
           <br><br>
           <input type="submit" value="Add class" name="add-class">
           <input type="submit" value="Remove class" name="remove-class">
         </form>
       </div>
       <div>
         <h4> Add new types of classes or remove existing ones. </h4>
         <form id="rm-classtype" method="post">
           <?php include 'class_selection.php' ?>
           <br><br>
           <input type="submit" value="Remove" name="remove-classtype">
         </form>
         <br>
         <form id="add-classtype" method="post">
           Add a new class.
           <input type="text" name="newclass">
           <br><br>
           <input type="submit" value="Add class" name="add-classtype">
         </form>
      </div>
    </div>
  </div>
      <div id="tabs-2">
        <div class="form-container">
          <div>
            <h4>Add teachers to your studio.</h4>
            <form id="add-teachers" method="post">
              Teacher First Name<br>
              <input type="text" name="teacherfirstname">
              <br><br>
              Teacher Last Name<br>
              <input type="text" name="teacherlastname">
              <br><br>
              Teacher Username:<br>
              <input type="text" name="teacherusername">
              <br><br>
              Teacher Password:<br>
              <input type="text" name="tacherpassword">
              <br><br>
              <input type="submit" value="Add new teacher" name="add-teacher">
            </form>
          </div>
          <div>
            <h4>Remove a teacher and all of their classes from your studio.</h4>
            <form id="rm-teachers" method="post">
              <?php include 'teacher_selection.php';?><br><br>
              <input type="submit" value="Remove Teacher" name="rm-teacher">
            </form>
        </div>
      </div>
    </div>
      <div id="tabs-3">
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
      <div id="tabs-4">
        <h4>Dive in to the details.</h4>
        <p>Our system provides detailed reports so that you can run the best version of your business.</p>
        <form id="detailed" method="post">
          <select name="details">
            <option value="">Select..</option>
            <option value="1">Customer Report</option>
            <option value="2">Teacher Report</option>
            <option valie="3">Class Report</option>
          </selct><br><br>
          <input type="submit" value="Get Report" name="report">
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

<?php
if(!session_id())
  session_start();
  if($_SESSION['managerlogin'] != 1){
    header('Location: index.php');
  }
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
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script>
   $( function() {
     $( "#tabs" ).tabs();
     $( '#stat-tabs').tabs();
     } );
   </script>
   <script>
   $( function() {
     $( "#datepicker" ).datepicker({
         dateFormat: 'yy-mm-dd',
         minDate: 0
         });
   } );
  $( function() {
    $( "#datepicker2" ).datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: 0
        });
  } );
  $( function() {
    $( "#datepicker3" ).datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: 0
        });
  } );
  $( function() {
   $( "#accordion" ).accordion();
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
          <input type="text" id="datepicker" name="date" required>
          <br><br>
          <input type="submit" value="See Schedule" name="sched">
          <br><br>
          <?php include 'schedule.php';?>
        </form>
       </div>
       <div id="accordion">
         <h4>Add classes to the schedule.</h4>
         <div>
          <form id="class-date" method="post">
           <input type="text" id="datepicker2" name="date" required>
           <br><br>
           <input type="submit" value="Select Date" name="add-date">
           </form>
           <?php if( isset($_POST['add-date'])){
             $_SESSION['date'] = $_POST['date'];
             echo "<form id='class-add' method='post'>";
             include 'available.php';
             echo "<br>";
             include 'class_selection.php';
             echo "<br>";
             include 'teacher_selection.php';
             echo"   <br><br>
               <input type='submit' value='Add class' name='add'>
             </form>";

           }
           include 'add_class.php';
          ?>

       </div>
         <h4>Remove classes from the schedule.</h4>
         <div>
            <form id="class-rm" method="post">
              <input type="text" id="datepicker3" name="date" required>
              <br><br>
              <input type="submit" value="Choose Date" name="remove-date">
            </form>
            <?php if (isset($_POST['remove-date'])){
              $_SESSION['date'] = $_POST['date'];

              echo"<form id='rm' method='post'>";
              include 'class_view.php';
              echo"<br><br>
              <input type='submit' value='Remove Class' name='rm'>
              </form>";
            }
             include 'remove_class.php';
             ?>
         </div>
         <h4> Add a new type of class. </h4>
         <div>
            <form id="add-classtype" method="post">
              <input type="text" name="newclass" required>
              <br><br>
              <input type="submit" value="Add class" name="add-classtype">
            </form>
         </div>
         <h4> Remove an existing class type. </h4>
         <div>
           <p> Warning: Removing a class type will remove all classes of that type
             from the schedule!</p>
           <form id="rm-classtype" method="post">
             <?php include 'class_selection.php' ?>
             <br><br>
             <input type="submit" value="Remove" name="remove-classtype">
           </form>
           <?php include 'remove_classtype.php';?>
         </div>
      </div>
    </div>
  </div>
      <div id="tabs-2">
        <div class="form-container">
          <div>
            <h4>Add teachers to your studio.</h4>
            <form id="add-teachers" method="post">
              Teacher First Name<br>
              <input type="text" name="teacherfirstname" required>
              <br><br>
              Teacher Last Name<br>
              <input type="text" name="teacherlastname" required>
              <br><br>
              Teacher Username:<br>
              <input type="text" name="teacherusername" required>
              <br><br>
              Teacher Password:<br>
              <input type="text" name="teacherpassword" required>
              <br><br>
              <input type="submit" value="Add new teacher" name="add-teacher">
              <?php include 'add_teacher.php'; ?>
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
          <select name="statistic" required>
            <option value="">Show me...</option>
            <option value="1">Most popular</option>
            <option value="2">Least popular</option>
          </select>
          <select name="subject" required>
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
       <div id="stat-tabs">
         <ul>
			      <li><a href="#stat-tabs-1">Member Joins by Month</a></li>
			      <li><a href="#stat-tabs-2">Customer Report</a></li>
			      <li><a href="#stat-tabs-3">Teacher Report</a></li>
			      <li><a href="#stat-tabs-4">Membership Report</a></li>
			   </ul>
         <div id="stat-tabs-1" style="padding-bottom: 5.5rem;">
          <?php include 'stats.php';?>
        </div><!--tab1-->
        <div id="stat-tabs-2">
          <h4>customer report here</h4>
        </div>
        <div id="stat-tabs-3">
          <h4>teacher report here</h4>
        </div>
        <div id="stat-tabs-4">
          <h4>Number of classes per membership type</h4>
        </div>
    </div><!--stats-tabs-->
  </div><!--outer tabs 4-->
</div><!--main tab list-->
  <footer>
    <nav>
      <ul class="container">
        <li><a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook fa-lg"></i></a></li>
        <li><a href="https://www.twitter.com" target="_blank"><i class="fa fa-twitter fa-lg"></i></a></li>
        <li><a href="https://www.instagram.com" target="_blank"><i class="fa fa-instagram fa-lg"></i></a></li>
        <li><a href="logout.php">Log out</a></li>
      <ul>
    </nav>
  </footer>
 </body>
</html>

<?php
if(!session_id())
  session_start();
  if($_SESSION['studentlogin'] != 1){
    header('Location: index.php');
  }
 $name = $_SESSION['firstname'];
 $membership = $_SESSION['membership'];
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
         dateFormat: 'yy-mm-dd',
         minDate: 0
         });
   } );
  </script>
 </head>
 <body>
   <div class="header"> <!-- title header -->
     <div class="container">
      <!--  <img src="resources/logo.png"> -->
        <i class="fa fa-fire fa-lg"></i>
        <span>Welcome to the Bhakti Membership page.</span>
     </div>
    </div>
    <div class="banner"> <!--banner -->
      <div class="container">
        <div class="headline">
          <h4>Welcome back,</h4>
          <h1><?php echo $_SESSION["firstname"] ."!"?></h1>
        </div>
      </div>
    </div> <!-- end of banner -->
  <div id="tabs">
      <ul>
        <li><a href="#tabs-1">Classes</a></li>
        <li><a href="#tabs-2">Membership</a></li>
      </ul>
      <div id="tabs-1">
        <div class="form-container">
          <div>
           <h4>Choose a date to sign up!</h4>
           <form id="schedule" method="post">
             Date: <input type="text" id="datepicker" name="date" required>
             <br><br>
             <input type="submit" value="See Schedule" name="sched">
             <br><br>
             <?php include 'schedule.php';?>
           </form>
          </div>
          <div>
            <form id="cancel" method="post">
              <h4>Cancel a class you've enrolled in.</h4>
              <select name='dropclass' required>
                <option value="">Select a class</option>
              <?php include 'cancel.php';?>
              </select>
              <br><br>
              <input type='submit' value='cancel' name='cancel'>
            </form>
              <?php
              if(isset($_POST['cancel'])){
                include 'connect.php';
                $sql = "DELETE FROM Booking WHERE Booking_ID ='"
                .$_POST['dropclass']."';";
                $result = $conn->query($sql);
                if($result === TRUE){
                  echo"<script>window.alert('You've successfully cancelled your class.');</script>";

                }else{
                echo ('Error description: ' . mysqli_error($conn));
                }
                $conn->close();
                header("Refresh: 0");
              }?>
          </div>
          <div>
              <?php include 'course_signup.php'?>
              <?php include 'course_register.php';?>

          </div>
       </div>
     </div>
      <div id="tabs-2">
        <div class="form-container">
         <div>
          <h4>Review and Manage Your Membership</h4>
          <?php include 'class_count.php';
          if($_SESSION['membership'] === "1"){
            $remaining = 10 - $_SESSION['classcount'];
          }else{
            $remaining = 20 - $_SESSION['classcount'];
          }
          echo "<h5>You are currently a " . $_SESSION['membertype'] . " member.</h5>";
          if($_SESSION['membership'] != "3"){
            if($remaining === '1'){
              echo"<h6> You only have 1 class left this month!</h6>
              <br><p>Upgrade your membership to enjoy more classes each month.</p>";
            }
            else{
              echo "<h6>You have " . $remaining . " classes left this month!</h6>
              <br><p>Upgrade your membership to enjoy more classes each month.</p>";
            }
          }
          else{
            echo "<h6> Enjoy unlimited classes each month at Bhakti</h6>
            <br><p>As an Unlimited member, you can enjoy yoga as often as you like.<p>";
          }
          ?>
         </div>
         <div>
           <h5>Change your membership status</h5>
           <form id="membership" method="post">
             <?php include 'membership.php';?>
             <input type="submit" value="Change Membership" name="mem-change">
          </form>
          <?php include 'mem_change.php';?>
        </div>
      </div>
  </div>
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

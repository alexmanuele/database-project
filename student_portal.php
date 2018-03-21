<?php
 session_start();
 $name = $_SESSION['firstname'];
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
        <div class="container">
          <div class="calendar">
            <p>Select a date to register for a class: <input type="text" id="datepicker"></p>
         </div>
         <div class="schedule">
           <p>The schedule will go here hopefully</p>
         </div>
       </div>
      <div id="tabs-2">
        Change membership status
      </div>
  </div>
  <footer>
     <div class="container">
           Established in 1658.
     </div>
  </footer>
 </body>
</html>

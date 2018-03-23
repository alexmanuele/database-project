<?php
if(!session_id())
  session_start();

  if ( isset($_POST['add'])){
    
    $servername = "db.cs.dal.ca";
    $username = "manuele";
    $password = "B00559291";
    $dbname = "manuele";


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);


    // Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }

  //  if($_SESSION['managerlogin'] === 1){
      $time = $_POST['timeslot'];
      $date = $_SESSION['date'];
      $class = $_POST['class-type'];
      $teach = $_POST['teacher'];

      $sql = "INSERT INTO Schedule (Sched_Date, Block_ID, Class_ID, Teacher_ID)
      VALUES ('$date', '$time', '$class', '$teach')";

      $result = $conn->query($sql);

      if ($result === TRUE) {
         echo "<script> window.alert('Class was added successfully');</script>";
      } else {
         echo "<script> window.alert('Something went wrong.');</script>";
      }
  //  }
    $conn->close();
  }

?>

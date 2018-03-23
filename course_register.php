<?php
if(!session_id())
  session_start();

  if(isset($_POST['signup'])){

    $servername = "db.cs.dal.ca";
    $username = "manuele";
    $password = "B00559291";
    $dbname = "manuele";

    $sched = $_POST['timeblock'];
    $stdnum = $_SESSION['studentnumber'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);


    // Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }


      $sql="INSERT INTO Booking (Sched_Number, Student_Number) VALUES ('$sched',
              '$stdnum');";
      $result= $conn->query($sql);
      if ($result === TRUE) {
        echo "<script> window.alert('Congratulations, you successfully signed up!');</script>";
      } else {
         echo "<p id='message'>Error: " . $sql . "<br>" . $conn->error . "</p>";
      }
    }
?>

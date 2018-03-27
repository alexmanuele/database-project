<?php
if(!session_id())
  session_start();

  if(isset($_POST['signup'])){

    include 'connect.php';

     $sched = $_POST['timeblock'];
     $stdnum = $_SESSION['studentnumber'];

      $sql="INSERT INTO Booking (Sched_Number, Student_Number) VALUES ('$sched',
              '$stdnum');";
      $result= $conn->query($sql);
      if ($result === TRUE) {
        echo "<script> window.alert('Congratulations, you successfully signed up!');</script>";
        header("Refresh: 0");
      } else {
         echo "<script> window.alert('Something went wrong.');</script>";
      }
    }
    $conn->close();
?>

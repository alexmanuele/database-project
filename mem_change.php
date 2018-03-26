<?php
if(!session_id())
  session_start();

  include 'connect.php';

  if (isset($_POST['mem-change'])){
    $memid = $_POST['membership'];
    $studnum = $_SESSION['studentnumber'];
    $sql = "UPDATE Student
            SET Membership_ID = ". $memid ."
            WHERE Student_Number = ".$studnum .";";
    $result = $conn->query($sql);
    if($result === TRUE){
      echo"<script>window.alert('You've successfully changed your membership!');</script>";

    }else{
    echo ('Error description: ' . mysqli_error($conn));
    }
  $conn->close();
 }
?>

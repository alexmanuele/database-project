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
    $_SESSION['membership'] = $memid;
    $result = $conn->query($sql);
    if($result === TRUE){
      echo"<script>window.alert('You've successfully changed your membership!');</script>";

    }else{
    echo "<script>window.alert('Something went wrong.');</script>";

    }
    header("Refresh: 0");
  $conn->close();
 }
?>

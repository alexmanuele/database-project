<?php
if(!session_id())
  session_start();

  if ( isset($_POST['add'])){

    include 'connect.php';

  //  if($_SESSION['managerlogin'] === 1){
      $time = $_POST['timeslot'];
      $date = $_SESSION['date'];
      $class = $_POST['class-type'];

      if($_SESSION['managerlogin'] === 1){
       $teach = $_POST['teacher'];
     }else{
       $teach= $_SESSION['staffid'];
     }

      $sql = "INSERT INTO Schedule (Sched_Date, Block_ID, Class_ID, Teacher_ID)
      VALUES ('$date', '$time', '$class', '$teach');";

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

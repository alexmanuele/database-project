<?php
if(!session_id())
  session_start();

  if ( isset($_POST['rm'])){

    include 'connect.php';

    $date = $_SESSION['date'];
    $time = $_POST['timeslot'];


    $sql = "DELETE FROM Schedule WHERE Sched_Date = '$date' AND Block_ID = '$time';";

    $result = $conn->query($sql);

    if ($result === TRUE) {
       echo "<script> window.alert('Class was removed successfully.');</script>";
       header("Refresh: 0");
    } else {
       echo "<script> window.alert('Something went wrong.');</script>";
    }

  $conn->close();
}
?>

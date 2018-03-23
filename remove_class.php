<?php
if(!session_id())
  session_start();

  if ( isset($_POST['rm'])){

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
    $date = $_SESSION['date'];
    $time = $_POST['timeslot'];


    $sql = "DELETE FROM Schedule WHERE Sched_Date = '$date' AND Block_ID = '$time';";

    $result = $conn->query($sql);

    if ($result === TRUE) {
       echo "<script> window.alert('Class was removed successfully.');</script>";
    } else {
       echo "<script> window.alert('Something went wrong.');</script>";
    }

  $conn->close();
}
?>

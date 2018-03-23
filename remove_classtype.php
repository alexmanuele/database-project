<?php
if(!session_id())
  session_start();

  if ( isset($_POST['remove-classtype'])){

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
    $class = $_POST['class-type'];


    $sql = "DELETE FROM Class_Type WHERE Class_ID = '$class';";

    $result = $conn->query($sql);

    if ($result === TRUE) {
       echo "<script> window.alert('Class was removed successfully." . $class . "');</script>";
    } else {
       echo "<script> window.alert('Something went wrong.');</script>";
    }

  $conn->close();
}
?>

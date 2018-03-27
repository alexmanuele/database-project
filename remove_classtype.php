<?php
if(!session_id())
  session_start();

  if ( isset($_POST['remove-classtype'])){

    include 'connect.php';

    $class = $_POST['class-type'];


    $sql = "DELETE FROM Class_Type WHERE Class_ID = '$class';";

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

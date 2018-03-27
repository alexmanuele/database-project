<?php
if(!session_id())
  session_start();

  if ( isset($_POST['rm-teacher'])){

    include 'connect.php';


    $teacher = $_POST['teacher'];


    $sql = "DELETE FROM Teacher WHERE Teacher_ID = '$teacher';";

    $result = $conn->query($sql);

    if ($result === TRUE) {
       echo "<script> window.alert('Teacher was removed successfully.');</script>";
       header("Refresh: 0");
    } else {
       echo "<script> window.alert('Something went wrong.');</script>";
    }

  $conn->close();
}
?>

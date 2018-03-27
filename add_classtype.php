<?php
if(!session_id())
  session_start();

  if ( isset($_POST['add-classtype'])){

    include 'connect.php';

      $class = $_POST['newclass'];
      $sql = "INSERT INTO Class_Type (Class_Desc)
      VALUES ('$class');";
      $result = $conn->query($sql);

      if ($result === TRUE) {
         echo "<script> window.alert('Class type was added successfully');</script>";
      } else {
         echo "<script> window.alert('Something went wrong.');</script>";
      }

    $conn->close();
  }

?>

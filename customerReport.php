<?php
if(!session_id())
  session_start();
  include 'connect.php';
  
 $sql = "SELECT Student_LName,Student_FName,Student_Number FROM Student;";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo("Membership #: ");
         echo($row["Student_Number"]);
         echo(" ,");
        echo($row["Student_LName"]);
        echo(" ,");
         echo($row["Student_FName"]);
         echo "<br>";
    }
} else {
     echo("Error description: " . mysqli_error($conn));
}
$conn->close();
?>

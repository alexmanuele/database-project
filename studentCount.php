<?php
if(!session_id())
  session_start();
  include 'connect.php';
 $sql = "SELECT COUNT(*) AS Count FROM Student;";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $studcount = $row["Count"];
    }
} else {
     echo("Error description: " . mysqli_error($conn));
}
$conn->close();
?>

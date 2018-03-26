<?php
if(!session_id())
  session_start();
  include 'connect.php';
  $studnum= $_SESSION['studentnumber'];
  $sql = "SELECT * FROM Booking LEFT JOIN Schedule USING (Sched_Number) LEFT JOIN Teacher USING(Teacher_ID)
LEFT JOIN Class_Type USING(Class_ID)
WHERE Student_Number = ".$studnum.";";

$result = $conn->query($sql);

if($result->num_rows > 0){

  while($row=$result->fetch_assoc()){
      echo "<option value='" . $row['Booking_ID'] . "'>" . $row['Block_Description'] . " "
            . $row['Class_Desc'] . " with " . $row['Teacher_FName'] . "</option>";

  }
  
}
?>

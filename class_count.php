<?php
if(!session_id())
  session_start();
include 'connect.php';
$studnum = $_SESSION['studentnumber'];
$sql = "SELECT COUNT(Booking_ID) as bk
FROM Booking LEFT JOIN Schedule USING(Sched_Number)
WHERE Month(Sched_date) = Month(".date('Y-m-d').")
AND Student_Number = ". $studnum .";";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo"<script>window.alert('now this far');</script>";
   while($row = $result->fetch_assoc()) {
       $_SESSION['classcount']= $row["bk"];
   }
  echo"<script>window.alert('".$sql."');</script>";
}

$sql = "select * from Membership WHERE Membership_ID = " . $_SESSION['membership'] .";";
$result = $conn-> query($sql);
while($row = $result -> fetch_assoc()){
  $_SESSION['membertype'] = $row['Membership_Desc'];
}
$conn->close();
?>

<?php
if(!session_id())
  session_start();
include 'connect.php';
$sql = "select count(Booking_ID) as count
from Booking left join Schedule using(Sched_Number)
where Month(Sched_date) = Month(".date('Y-m-d').")
and  Student_Number = ". $_SESSION['studentnumber'] .";";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
       $_SESSION['classcount'] = $row["count"];
   }
}

$sql = "select * from Membership WHERE Membership_ID = " . $_SESSION['membership'] .";";
$result = $conn-> query($sql);
while($row = $result -> fetch_assoc()){
  $_SESSION['membertype'] = $row['Membership_Desc'];
}
$conn->close();
?>

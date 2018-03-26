<?php
if(!session_id())
  session_start();
include 'connect.php';
echo "<script>window.alert('inside');</script>";
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
$conn->close();
?>

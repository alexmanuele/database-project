<?php
if(!session_id())
  session_start();
include 'connect.php';
$studnum = $_SESSION['studentnumber'];
$date = date('Y-m-d');

$sql =  "SELECT COUNT(Booking_ID) as bk FROM Booking LEFT JOIN Schedule USING(Sched_Number)
WHERE MONTH(Sched_date) = MONTH(".$date.")
AND Student_Number = ".$studnum.";";
echo"<script>window.alert('".$date."');</script>";

$result = $conn->query($sql);

$data = $result->fetch_assoc();
$count = $data['bk'];
echo"<script>window.alert('".$count."');</script>";
$_SESSION['classcount']= $data['bk'];



$sql = "select * from Membership WHERE Membership_ID = " . $_SESSION['membership'] .";";

$result = $conn-> query($sql);
while($row = $result -> fetch_assoc()){
  $_SESSION['membertype'] = $row['Membership_Desc'];
}
$conn->close();
?>

<?php
if(!session_id())
  session_start();

if(isset($_POST['add-date'])){
  $servername = "db.cs.dal.ca";
  $username = "manuele";
  $password = "B00559291";
  $dbname = "manuele";

  $date = $_POST['date'];
// Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql="SELECT Block_ID, Block_Description FROM Time_Block T
  LEFT OUTER JOIN (SELECT * FROM Schedule WHERE Sched_Date = '$date') AS S
  USING (Block_ID)
  WHERE Sched_Number is null;";
  $result= $conn->query($sql);
  if($result->num_rows === 0){
    echo "<script> window.alert('There are no available time slots.');</script>";
    header( "Refresh:0");
  }
  if($result->num_rows > 0){
    echo "<select name='timeslot' required>
            <option value=''>Select a time slot.</option>";
    while($row=$result->fetch_assoc()){
      echo "<option value='" . $row['Block_ID'] . "'>" . $row['Block_Description'] . "</option>";

    }
    echo"</select>";
  }
}
$conn->close();
?>

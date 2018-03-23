<?php
if(!session_id())
  session_start();

  $servername = "db.cs.dal.ca";
  $username = "manuele";
  $password = "B00559291";
  $dbname = "manuele";

  $date = $_SESSION['date'];

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);


  // Check connection
  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
  }
  $sql="SELECT * FROM Schedule LEFT JOIN Time_Block USING(Block_ID) LEFT JOIN
        Teacher USING (Teacher_ID) LEFT JOIN Class_Type USING(Class_ID)
        WHERE Sched_Date= '$date';";
  $result= $conn->query($sql);
  if($result->num_rows > 0){
    echo "<select name='timeslot' required>
            <option value=''>Select a time slot.</option>";
    while($row=$result->fetch_assoc()){
        echo "<option value='" . $row['Block_ID'] . "'>" . $row['Block_Description'] . " "
              . $row['Class_Desc'] . " with " . $row['Teacher_FName'] . "</option>";

    }
    echo"</select>";

  }


  $conn->close();

?>

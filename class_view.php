<?php
if(!session_id())
  session_start();

  $date = $_SESSION['date'];

  include 'connect.php';
  
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

<?php
if(!session_id())
  session_start();

include 'connect.php';

$sql="SELECT * FROM Teacher;";
$result= $conn->query($sql);
if($result->num_rows > 0){
  echo "<select name='teacher' required>
          <option value=''>Select a teacher</option>";
  while($row=$result->fetch_assoc()){
    echo "<option value='" . $row['Teacher_ID'] . "'>" . $row['Teacher_FName'] . " " .
          $row['Teacher_LName'] . "</option>";

  }
  echo"</select>";
}
$conn->close();

?>

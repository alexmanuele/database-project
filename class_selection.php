<?php
if(!session_id())
  session_start();

include 'connect.php';

$sql="SELECT * FROM Class_Type;";
$result= $conn->query($sql);
if($result->num_rows > 0){
  echo "<select name='class-type' required>
          <option value=''>Select a class</option>";
  while($row=$result->fetch_assoc()){
    echo "<option value='" . $row['Class_ID'] . "'>" . $row['Class_Desc'] . "</option>";

  }
  echo"</select>";
}
$conn->close();

?>

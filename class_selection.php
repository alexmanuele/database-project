<?php
if(!session_id())
  session_start();
$servername = "db.cs.dal.ca";
$username = "manuele";
$password = "B00559291";
$dbname = "manuele";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

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

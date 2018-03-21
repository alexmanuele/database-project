<?php
if(!session_id())
  session_start();

if(isset($_POST['sched'])){
  echo"<h4>Choose a class and sign up today!</h4>
  <form id='class-signup' method='post'>";

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
  $sql="SELECT * FROM Schedule WHERE Date = '$date'";
  $result= $conn->query($sql);
  if($result->num_rows > 0){
    echo "<select name='timeblock' required>
            <option value=''>Select a class</option>";
    while($row=$result->fetch_assoc()){
        echo "<option value='" . $row['Sched_Number'] . "'>" . $row['Block_ID'] . "</option>";

    }
    echo"</select>";
    echo"<br><br><input type='submit' value='signup' name='class-signup'></form>";
  }
  $conn->close();

}
 ?>

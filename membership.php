<?php
if(!session_id())
  session_start();

  include 'connect.php';

  $sql = "select * from Membership
          where Membership_ID != '" .$_SESSION['membership'] . "';";
  $result = $conn->query($sql);


  if($result->num_rows > 0){
    echo "<select name='membership' required>
            <option value=''>Select a membership.</option><br>";
    while($row=$result->fetch_assoc()){
      echo "<option value='" . $row['Membership_ID'] . "'>" . $row['Membership_Desc'] . "</option>";

    }

    echo"</select>";
  }
  $conn->close();

?>

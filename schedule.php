<?php
if(!session_id())
  session_start();
if(isset($_POST["sched"]))
{

  $servername = "db.cs.dal.ca";
  $username = "manuele";
  $password = "B00559291";
  $dbname = "manuele";

  $date=$_POST['date'];
  echo "<br>" . $date . "<br>";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
  }

  $query = "select * from Schedule where Date = '$date';";
  $result = $conn->query($query);

  if($result->num_rows > 0){ //if the query has results
   echo"<table>
    <thead>
      <tr>
        <th>Time</th>
        <th>Class Type</th>
        <th>Teacher</th>
      </tr>
    </thead>
    <tbody>";

    while($row=mysqli_fetch_assoc($result))
    {
     echo "<tr>
      <td>$row[Block_ID]
      <td>$row[Class_Code]
      <td>Teacher_Name_here
      </tr>";
    }
    echo "</tbody>
      </table>";
  }
  else{
    echo "Oops! There are no classes scheduled on " . $date;
  }
 $conn->close();
}
 ?>

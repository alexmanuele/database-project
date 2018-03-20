<?php

if(isset($_POST["submit"]))
{
  $servername = "db.cs.dal.ca";
  $username = "manuele";
  $password = "B00559291";
  $dbname = "manuele";

  $date=$_POST['date'];

  if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
  }

  echo"<table>
    <thead>
      <tr>
        <th>Time</th>
        <th>Class Type</th>
        <th>Teacher</th>
      </tr>
    </thead>
    <tbody>"

  $q = "select * from Schedule where Date = $date;"
  $r = $conn->query($q);

  while($rw=mysqli_fetch_assoc($r))
  {
    echo"<tr>
      <td>$rw[Block_ID]
      <td>$rw[Class_Code]
      <td>Teacher_Name_here
      </tr>";
  }
  echo "</tbody>
      </table>";

}

 ?>

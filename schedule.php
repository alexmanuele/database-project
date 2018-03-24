<?php
if(!session_id())
  session_start();
if(isset($_POST["sched"]))
{

  include 'connect.php';
  
  $date=$_POST['date'];
  echo "<br>" . $date . "<br>";


//  $query = "select * from Schedule where Date = '$date';";
 $query = "
SELECT Block_Description, Class_Desc, Teacher_FName
from Schedule left join Time_Block using (Block_ID)
left join Class_Type using (Class_ID) left join Teacher using (Teacher_ID)
Where Sched_Date = '$date';";
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
      <td>$row[Block_Description]
      <td>$row[Class_Desc]
      <td>$row[Teacher_FName]
      </tr>";
    }
    echo "</tbody>
      </table>";
  }
  else{
    echo "<script> window.alert('Oops! There are no classes scheduled on that date.');</script>";
  }
 $conn->close();
}
 ?>

<?php
if(!session_id())
  session_start();

  include 'connect.php';

  $sql="SELECT COUNT(Booking_ID) as bk, Student_Number, Student_LName, Student_FName FROM Booking LEFT JOIN Schedule USING(Sched_Number) RIGHT OUTER JOIN Student USING(Student_Number) GROUP BY Student_Number ORDER BY bk DESC LIMIT 20";
  $result = $conn->query($sql);

if($result->num_rows > 0){ //if the query has results
 echo"<h2>Top 20 Members</h2>
 <table>
  <thead>
    <tr>
      <th>Attendence</th>
      <th>Student's Name</th>
      <th>Member #</th>
    </tr>
  </thead>
  <tbody>";

  while($row=mysqli_fetch_assoc($result))
  {
   echo "<tr>
    <td>$row[bk]
    <td>$row[Student_LName], $row[Student_FName]
     <td>$row[Student_Number]
    </tr>";
  }
  echo "</tbody>
    </table>";
}
  $conn->close();
  ?>

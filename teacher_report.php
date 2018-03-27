<?php
if(!session_id())
  session_start();

  include 'connect.php';

  $sql="SELECT COUNT(Booking_ID) as bk, Teacher_FName
        FROM Booking
        LEFT JOIN Schedule USING(Sched_Number)
        RIGHT OUTER JOIN Teacher USING(Teacher_ID)
        GROUP BY Teacher_ID
        ORDER BY bk DESC;";
  $result = $conn->query($sql);

if($result->num_rows > 0){ //if the query has results
 echo"<table>
  <thead>
    <tr>
      <th>Teacher</th>
      <th>Number of Bookings</th>
    </tr>
  </thead>
  <tbody>";

  while($row=mysqli_fetch_assoc($result))
  {
   echo "<tr>
    <td>$row[Teacher_FName]
    <td>$row[bk]
    </tr>";
  }
  echo "</tbody>
    </table>";
}
  $conn->close();
  ?>

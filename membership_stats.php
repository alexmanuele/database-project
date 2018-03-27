<?php
if(!session_id())
  session_start();

  include 'connect.php';

  $sql="SELECT COUNT(Booking_ID) as bk, Membership_Desc
        FROM Booking
        LEFT JOIN Student USING (Student_Number)
        LEFT JOIN Membership USING(Membership_ID)
        GROUP BY Membership_ID;";

  $result= $conn->query($sql);


  echo"<script type='text/javascript'>
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Membership Type', 'Classes Attended'],
          ";
          while($row = $result->fetch_assoc()){
            echo"['".$row['Membership_Desc']."',  ".$row['bk']."],";
          }
          echo"
          ['Work',     0]

          ]);

        var options = {
          title: 'Percentage of Bookings by Membership Type',
          width: 600,
          height: 400,
          slices: [{offset: 0.1}, {offset:0.1}, {offset:0.1}],
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <div id='piechart' style='width: 900px; height: 500px;'></div>";
    $conn->close();
  ?>

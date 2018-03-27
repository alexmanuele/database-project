<?php
if(!session_id())
  session_start();

  include 'connect.php';

 $sql = "SELECT COUNT(*) AS bCount FROM Student WHERE MONTH(Student.Registration_Date)=MONTH('2018-01-15');";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $janstat = $row["bCount"];
    }
} else {
     echo("Error description: " . mysqli_error($conn));
}
 $sql = "Select COUNT(*) as bCount From Student where Month(Student.Registration_Date)=Month('2018-02-15');";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $febstat = $row["bCount"];
    }
} else {
    echo "Error <br>";
} $sql = "Select COUNT(*) as bCount From Student where Month(Student.Registration_Date)=Month('2018-03-15');";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $marchstat = $row["bCount"];
    }
} else {
    echo "Error <br>";
} $sql = "Select COUNT(*) as bCount From Student where Month(Student.Registration_Date)=Month('2018-04-15');";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $aprilstat = $row["bCount"];
    }
} else {
    echo "Error <br>";
}
$conn->close();

echo'
      			  <script type="text/javascript">
			    google.charts.load("current", {packages:["corechart"]});
			    google.charts.setOnLoadCallback(drawChart);
			    function drawChart() {
			      var data = google.visualization.arrayToDataTable([
			        ["Month", "New Members", { role: "style" } ],
			        ["Jan", ' . $janstat . ', "blue"],
			        ["Feb", '. $febstat . ', "silver"],
			        ["March", ' . $marchstat . ', "gold"],
			        ["April", ' . $aprilstat . ', "green"]
			      ]);
			      var memberView = new google.visualization.DataView(data);
			      memberView.setColumns([0, 1,
			                       { calc: "stringify",
			                         sourceColumn: 1,
			                         type: "string",
			                         role: "annotation" },
			                       2]);
			      var options = {
			        title: "Member joins by Month",
			        width: 600,
			        height: 400,
			        bar: {groupWidth: "95%"},
			        legend: { position: "none" },
			      };
			      var memberChart = new google.visualization.ColumnChart(document.getElementById("columnchart_values_member"));
			      memberChart.draw(memberView, options);
			  }
			  </script>
	<div id="columnchart_values_member" style="width: 900px; height: 300px;"></div> ';

?>

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
?>

<?php
session_start();

if(isset($_POST["login"]))
{

 $studentusername =$_POST['membername'];
 $loginpassword=$_POST['studentpassword'];

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
 //echo $studentID . "<br>";
 $sql = "SELECT Student_Password FROM Student WHERE Student_Username = '$studentusername';";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $confirmPass = $row["Student_Password"];
        $_SESSION["firstname"] = $row["Student_FName"];
        $_SESSION["memberusername"] = $row["Student_Username"];
    }
} else {
    echo "Error <br>";
}

 //check password and go to student portal if it is correct
 if(strcmp($confirmPass, $loginpassword) == 0 && $loginpassword != ""){
   header('Location: student_portal.php');
   exit();
 }
 else echo "Incorrect Username or Password.";

 $conn->close();
}
?>

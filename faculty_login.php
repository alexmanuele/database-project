<?php
session_start();
if(isset($_POST["stafflogin"]))
{
  echo "This worked";
 $facultyusername =$_POST['staffname'];
 $loginpassword=$_POST['staffpassword'];
 $staff_type=$_POST['stafftype'];

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

 if($staff_type === "1"){

  $sql = "SELECT * FROM Teacher WHERE Teacher_Username = '$staffusername';";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $confirmPass = $row["Teacher_Password"];
        $_SESSION["firstname"] = $row["Teacher_FName"];
        $_SESSION["staffusername"] = $row["Teacher_Username"];
    }
  } else {
    echo "Error <br>";
  }

  //check password and go to student portal if it is correct
  if(strcmp($confirmPass, $loginpassword) == 0 && $loginpassword != ""){
   header('Location: teacher_portal.php');
  }
  else echo "Incorrect Username or Password.";

 }else if($staff_type === "2"){
   $sql = "SELECT * FROM Manager WHERE Manager_Username = '$staffusername';";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         $confirmPass = $row["Manager_Password"];
         $_SESSION["firstname"] = $row["Manager_FName"];
         $_SESSION["staffusername"] = $row["Manager_Username"];
     }
   } else {
     echo "Error <br>";
   }

   //check password and go to student portal if it is correct
   if(strcmp($confirmPass, $loginpassword) == 0 && $loginpassword != ""){
    header('Location: manager_portal.php');
   }
   else echo "Incorrect Username or Password.";
 }else {
   echo "Incorrect Credentials. Please check and try again.";
 }
  $conn->close();
}
?>

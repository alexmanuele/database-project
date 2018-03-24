<?php
if(!session_id())
  session_start();
if(isset($_POST["login"]))
{

 $studentusername =$_POST['membername'];
 $loginpassword=$_POST['studentpassword'];

 include 'connect.php';
 //echo $studentID . "<br>";
 $sql = "SELECT * FROM Student WHERE Student_Username = '$studentusername';";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $confirmPass = $row["Student_Password"];
        $_SESSION["firstname"] = $row["Student_FName"];
        $_SESSION["memberusername"] = $row["Student_Username"];
        $_SESSION["studentnumber"] = $row["Student_Number"];
    }
} else {
    echo "Error <br>";
}

 //check password and go to student portal if it is correct
 if(strcmp($confirmPass, $loginpassword) == 0 && $loginpassword != ""){
   $_SESSION['studentlogin'] = 1;
   header('Location: student_portal.php');
   exit();
 }
 else echo "Incorrect Username or Password.";

 $conn->close();
}
?>

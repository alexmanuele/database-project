<?php
if(!session_id())
  session_start();
if(isset($_POST["stafflogin"]))
{

 $facultyusername =$_POST['staffname'];
 $loginpassword=$_POST['staffpassword'];
 $staff_type=$_POST['stafftype'];

  include 'connect.php';

 if($staff_type === "1"){

  $sql = "SELECT * FROM Teacher WHERE Teacher_Username = '$facultyusername';";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $confirmPass = $row["Teacher_Password"];
        $_SESSION["firstname"] = $row["Teacher_FName"];
        $_SESSION["staffusername"] = $row["Teacher_Username"];
        $_SESSION['staffid'] = $row["Teacher_ID"];
    }
  } else {
    echo "Error <br>";
  }

  //check password and go to student portal if it is correct
  if(strcmp($confirmPass, $loginpassword) == 0 && $loginpassword != ""){
    $_SESSION["teacherlogon"] = 1;
   header('Location: teacher_portal.php');
  }
  else{ echo "Incorrect Username or Password.";
        echo $confirmPass;
  }

 }else if($staff_type === "2"){
   $sql = "SELECT * FROM Manager WHERE Manager_Username = '$facultyusername';";
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
     $_SESSION['managerlogin'] = 1;
    header('Location: manager_portal.php');
   }
   else echo "Incorrect Username or Password.";
 }else {
   echo "Incorrect Credentials. Please check and try again.";
 }
  $conn->close();
}
?>

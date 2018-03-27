<?php
if(!session_id())
  session_start();
if(isset($_POST["add-teacher"]))
{



 $firstname=$_POST['teacherfirstname']; //can retrieve data using $_POST from the post method used above
 $lastname=$_POST['teacherlastname'];
 $signupname=$_POST['teacherusername'];
 $signuppassword=$_POST['teacherpassword'];


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

//SQL Query
  $sql = "INSERT INTO Teacher (Teacher_FName, Teacher_LName, Teacher_Username, Teacher_Password)
  VALUES ('$firstname', '$lastname', '$signupname', '$signuppassword');"; //use the vars as values for the Query

  $result = $conn->query($sql);

  if ($result === TRUE) {
     echo "<script> window.alert('Teacher added successfully');</script>";
  } else {
     echo "<script> window.alert('Something went wrong.');</script>";
  }

  $conn->close();

}
?>

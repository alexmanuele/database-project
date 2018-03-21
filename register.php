<?php
session_start();

function generateStudentNum()
{
    static $studentNumber = 1000100;
    $studentNumber += rand(100, 236);
    return $studentNumber;
}

if(isset($_POST["submit"]))
{

 $studNum = generateStudentNum();

 $firstname=$_POST['firstname']; //can retrieve data using $_POST from the post method used above
 $lastname=$_POST['lastname'];
 $signupname=$_POST['username'];
 $signuppassword=$_POST['signuppassword'];
 $membership=$_POST['membership'];

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
  $sql = "INSERT INTO Student (Student_Number, Student_Username, Student_FName, Student_LName, Student_Password, Membership_ID)
  VALUES ('$studNum', '$signupname', '$firstname', '$lastname', '$signuppassword', '$membership')"; //use the vars as values for the Query

  $result = $conn->query($sql);

  if ($result === TRUE) {
    echo "<script> window.alert('Congratulations, you successfully signed up!');</script>";
  } else {
     echo "<script> window.alert('Something went wrong.');</script>";
  }

  $conn->close();

}
?>

<?php
if(!session_id())
  session_start();

/*function generateStudentNum()
{
    static $studentNumber = 1000100;
    $studentNumber += rand(100, 236);
    return $studentNumber;
} */

if(isset($_POST["submit"]))
{

 //$studNum = generateStudentNum();

 $firstname=$_POST['firstname']; //can retrieve data using $_POST from the post method used above
 $lastname=$_POST['lastname'];
 $signupname=$_POST['username'];
 $signuppassword=$_POST['signuppassword'];
 $membership=$_POST['membership'];
 $date = date("Y-m-d");

  include 'connect.php'; 

//SQL Query
  $sql = "INSERT INTO Student (Student_Username, Student_FName, Student_LName, Student_Password, Membership_ID, Registration_Date)
  VALUES ('$signupname', '$firstname', '$lastname', '$signuppassword', '$membership', '$date')"; //use the vars as values for the Query

  $result = $conn->query($sql);

  if ($result === TRUE) {
    echo "<script> window.alert('Congratulations, you successfully signed up!');</script>";
  } else {
     echo "<script> window.alert('Something went wrong.');</script>";
  }

  $conn->close();

}
?>

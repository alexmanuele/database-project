<?php
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
  $middlename=$_POST['middlename'];
  $signuppassword=$_POST['signuppassword'];


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
  $sql = "INSERT INTO Student (Student_Number, Student_FName, Student_MName, Student_LName, Student_Password)
  VALUES ('$studNum', '$firstname', '$middlename', '$lastname', '$signuppassword')"; //use the vars as values for the Query

  $result = $conn->query($sql);

  if ($result === TRUE) {
     echo "<p id='message'>Congratulations, You've successfully signed up! <br><br>Your student ID is " . $studNum . "<br></p>";
  } else {
     echo "<p id='message'>Error: " . $sql . "<br>" . $conn->error . "</p>";
  }

  $conn->close();

}
?>

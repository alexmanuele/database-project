<?php
if(!session_id())
  session_start();

if(isset($_POST['sched'])){
  $canRegister = false;
  include 'class_count.php';
  $count = $_SESSION['classcount'];
  echo"<script>window.alert('class count ".$count."');</script>";
  if($_SESSION['membership'] === "1"){ //casual membership

    if($count < 10){
      $canRegister = true;

    }
    else
      echo"<script>window.alert('Sorry, You've registered for your maximum number of classes!\n
              Please change your membership type to get more, or wait until next month.');</script>";
  }
  if($_SESSION['membership'] === "2"){ //casual membership
    if($count < 20){
      $canRegister = true;
    }
    else
      echo"<script>window.alert('Sorry, You've registered for your maximum number of classes!\n
              Please change your membership type to get more, or wait until next month.');</script>";
  }
  if($_SESSION['membership'] === "3"){
    $canRegister = true;
  }

  if($canRegister === true){

  echo"<h4>Choose a class and sign up today!</h4>
  <form id='class-signup' method='post'>";

  $date = $_POST['date'];
  $studnum = $_SESSION['studentnumber'];
  include 'connect.php';

  $sql="SELECT * FROM Schedule LEFT JOIN Time_Block USING(Block_ID) LEFT JOIN
        Teacher USING (Teacher_ID) LEFT JOIN Class_Type USING(Class_ID)
        LEFT OUTER JOIN Booking USING(Sched_Number)
        WHERE Sched_Date= '$date' AND (Student_Number <> ". $studnum ." OR Student_Number IS NULL);";
  $result= $conn->query($sql);
  if($result->num_rows > 0){
    echo "<select name='timeblock' required>
            <option value=''>Select a class</option>";
    while($row=$result->fetch_assoc()){
        echo "<option value='" . $row['Sched_Number'] . "'>" . $row['Block_Description'] . " "
              . $row['Class_Desc'] . " with " . $row['Teacher_FName'] . "</option>";

    }
    echo"</select>";
    echo"<br><br><input type='submit' value='signup' name='signup'></form>
    ";
  }


  $conn->close();

}
}
 ?>

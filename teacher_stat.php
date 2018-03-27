<?php
if(!session_id())
  session_start();
 include 'connect.php';

 if (isset($_POST['submit'])){
   $output = "not set";
   $teacherid = $_SESSION['staffid'];
   if($_POST['statistic'] == 1){
     $condition = "most";
     if($_POST['subject'] == 1){ //most popular Class_Type
       $subject = "class type";
       $sql = "SELECT MAX(A.most), A.class  FROM(
                SELECT COUNT(Booking_ID) as most, Class_Desc as class
                FROM Booking LEFT JOIN Schedule USING(Sched_Number)
                LEFT JOIN Class_Type USING(Class_ID)
                LEFT JOIN Teacher USING(Teacher_ID)
                WHERE Teacher_ID = ".$teacherid."
                GROUP BY Class_Desc) AS A
                GROUP BY class;";
      $result = $conn->query($sql);
      $data = $result->fetch_assoc();
      $output = $data['class'];

   }
   else if($_POST['subject'] == 2){
     $subject = "class time";
     $sql = "SELECT MAX(A.most) AS most, Block_Description as block FROM(
              SELECT COUNT(Booking_ID) most, Block_Description
              FROM Booking LEFT JOIN Schedule USING(Sched_Number)
              LEFT JOIN Time_Block USING(Block_ID)
              LEFT JOIN Teacher USING(Teacher_ID)
              WHERE Teacher_ID = ".$teacherid."
              GROUP BY Block_Description) AS A
              GROUP BY block;";
      $result = $conn->query($sql);
      $data = $result->fetch_assoc();
      $output = $data['block'];

   }


  }
  else if($_POST['statistic'] == 2){
    $condition = "least";
    if($_POST['subject'] == 1){ //least popular Class_Type
      $subject = "class type";
      $sql = "SELECT MIN(A.most), A.class  FROM(
               SELECT COUNT(Booking_ID) as most, Class_Desc as class
               FROM Booking LEFT JOIN Schedule USING(Sched_Number)
               LEFT JOIN Class_Type USING(Class_ID)
               LEFT JOIN Teacher USING(Teacher_ID)
               WHERE Teacher_ID = ".$teacherid."
               GROUP BY Class_Desc) AS A
               GROUP BY class;";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    $output = $data['class'];


  }
  else if($_POST['subject'] == 2){
    $subject = "time for a class";
    $sql ="SELECT MIN(A.most) AS most, Block_Description as block FROM(
             SELECT COUNT(Booking_ID) most, Block_Description
             FROM Booking LEFT JOIN Schedule USING(Sched_Number)
             LEFT JOIN Time_Block USING(Block_ID)
             LEFT JOIN Teacher USING(Teacher_ID)
             WHERE Teacher_ID = ".$teacherid."
             GROUP BY Block_Description) AS A
             GROUP BY block;";
     $result = $conn->query($sql);
     $data = $result->fetch_assoc();
     $output = $data['block'];

   }
  }
  echo "<script>window.alert('Your ".$condition." popular ".$subject. " is " .$output.".');</script>";
}
?>

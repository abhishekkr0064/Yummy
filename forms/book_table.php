<?php
include_once 'connection.php';
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$date=$_POST['date'];
$start_time=$_POST['start_time'];
$end_time=$_POST['end_time'];
$people=$_POST['people'];
$message=$_POST['message'];

$sql="INSERT INTO book_tables(name,email,phone,date,start_time,end_time,people,message)
 VALUES('$name','$email','$phone','$date','$start_time','$end_time','$people','$message')";

 $result=mysqli_query($con,$sql);

 if($result)
 {
    echo "
       <script>
       alert('Thanks You Sir 👍');
        window.location.href='../index.php';
       </script>
    ";
 }
 else{
    echo "
        <script>
        alert('Sorry Somethings went Worng');
        window.location.href='../index.php';
        </script>
    ";
 }

?>
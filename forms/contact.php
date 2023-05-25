<?php
include_once 'connection.php';

$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];


$sql="INSERT INTO contact_us(name,email,subject,message) VALUES('$name','$email','$subject','$message')";

$result=mysqli_query($con,$sql);

if($result)
{
  echo "
  <script>
  alert('Your Message Sent Successfully 👍');
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
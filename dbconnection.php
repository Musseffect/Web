<?php 
$conn = mysqli_connect("localhost","root","","cloudcomp");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
  }
  mysqli_set_charset($conn,"utf8");
?>
<?php
include 'connect.php';
$id=$_GET['id'];
$del=mysqli_query($con,"DELETE FROM students WHERE id='$id'");
   if($del){
   	header("location:students.php");
   }
   
?>
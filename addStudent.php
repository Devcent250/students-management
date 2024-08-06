 <?php
session_start();
error_reporting();
if (!isset($_SESSION['username'])) {
	header("location:index.php");
}
else{
?>
<?php
include 'connect.php';
if(isset($_POST['submit'])){
	  $id=$_POST['id'];
      $ln = $_POST['Names'];
      $age = $_POST['Age'];
      $gender = $_POST['Gender'];
      $marks = $_POST['Marks'];
$add=mysqli_query($con,"INSERT INTO students (Names,Age,gender,Marks)VALUES('$ln','$age','$gender','$marks')");
    if($add){
    	header("location:students.php");
    }
    else{
    	echo"<script>window.alert('Please try again')</script>";
    }
}
?>

<style>
      .hd {
        background: black;
        padding: 22px;
        text-align: center;
        font-size: 16px;
        font-family: poppins, sans-serif;
        color: #fff;
    }
	table{
		color: #fff;
		border: 2px solid blue;
		border-radius: 3px;
        padding:3px;
	}
	tr{
		background: green;
		border-radius: 6px;
		color: #fff;
	}
	td{
		color: #fff;
		background: black;
	}
    table a{
        text-decoration:none;
    }
    .logout-btn {
        color: white;
        background: red;
        border-radius: 5px;
        padding: 10px;
        text-decoration: none;
        font-size: 18px;
        margin: 20px 0;
        display: inline-block;
    }
</style>
<div class="hd">
    <h1>STUDENTS MANAGEMENT SYSTEM</h1>
</div><br/><br/><br/><br/>
<center>
	<fieldset style="width: 500px;background: green;border: 2px solid black;border-radius: 5px;margin-right: 50px;">
		<form action="addStudent.php" method="POST">
              

    
  
    <p>NAMES:</p>
    <input type="text" name="Names"  placeholder="Enter Last Name" required>

    <p>AGE:</p>
    <input type="number" name="Age"  placeholder="Enter Age" required>
    
    <p>GENDER:</p>
    <select name="Gender" required>
        <option value="">Select Gender</option>
        <option value="m">Male</option>
        <option value="f" >Female</option>
    </select>
    
    <p>MARKS:</p>
    <input type="number" name="Marks"  placeholder="Enter Marks" required>
    
    <p>
        <input type="submit" name="submit" value="Register Student  ">
        <input type="reset" name="reset" value="Cancel">
    </p>
</form>
        </fieldset>
		<a href="logout.php" class="logout-btn">Logout</a>
    </center>
	<?php
}

?>

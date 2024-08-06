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
$edit=mysqli_query($con,"UPDATE students SET Names='$ln',Age='$age',gender='$gender',Marks='$marks' WHERE id='$id'");
    if($edit){
    	header("location:students.php");
    }
    else{
    	echo"<script>window.alert('Please try again')</script>";
    }
}
?>
<?php
include 'connect.php';
$id=$_GET['id'];
$sel=mysqli_query($con,"SELECT *FROM students WHERE id='$id'");
while($data=mysqli_fetch_array($sel)){
	?>   <style>
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
</style>
<div class="hd">
  <h1>STUDENTS MANAGEMENT SYSTEM</h1>
</div>
<center>
	
	<h1><i>UPDATE USER!!!</i></h2>
	<fieldset style="width: 500px;background: green;border: 2px solid black;border-radius: 5px;margin-right: 50px;">
		<form action="update.php" method="POST">
              
    <p>ID:</p>
    <input type="number" name="id" value="<?php echo $data['id'];?>" readonly>

    <p>NAMES:</p>
    <input type="text" name="Names" value="<?php echo $data['Names'];?>" placeholder="Enter Last Name" required>

    <p>AGE:</p>
    <input type="number" name="Age" value="<?php echo $data['Age'];?>" placeholder="Enter Age" required>
    
    <p>GENDER:</p>
    <select name="Gender" required>
        <option value="">Select Gender</option>
        <option value="m" <?php if($data['Gender'] == 'm') echo 'selected'; ?>>Male</option>
        <option value="f" <?php if($data['Gender'] == 'f') echo 'selected'; ?>>Female</option>
    </select>
    
    <p>MARKS:</p>
    <input type="number" name="Marks" value="<?php echo $data['Marks'];?>" placeholder="Enter Marks" required>
    
    <p>
        <input type="submit" name="submit" value="Update  ">
        <input type="reset" name="reset" value="Cancel">
    </p>
</form>
        </fieldset>
		
    </center>
	<?php
}}

?>

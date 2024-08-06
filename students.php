<?php
session_start();
error_reporting();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
} else {
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
    table {
        color: #fff;
        border: 2px solid blue;
        border-radius: 3px;
        padding: 3px;
    }
    tr {
        background: green;
        border-radius: 6px;
        color: #fff;
    }
    td {
        color: #fff;
        background: black;
    }
    table a {
        text-decoration: none;
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
<a href="addStudent.php" style="color:white;background:black;border-radius:5px; padding: 5px;text-decoration:none;font-size:22px;margin-right:55%;">Register Student +</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>NAMEs</th>
        <th>AGE</th>
        <th>Gender</th>
        <th>Marks</th>
        <th colspan="2">MODIFY</th>
    </tr>
    <?php
    include 'connect.php';
    $sel = mysqli_query($con, "SELECT * FROM students");
    while ($data = mysqli_fetch_array($sel)) {
        echo "<tr>";
        echo "<td>" . $data['id'] . "</td>";
        echo "<td>" . $data['Names'] . "</td>";
        echo "<td>" . $data['Age'] . "</td>";
        echo "<td>" . $data['Gender'] . "</td>";
        echo "<td>" . $data['Marks'] . "</td>";
        echo "<td><a href='update.php?id=" . $data['id'] . "'>Update</a></td>";
        echo "<td><a href='delete.php?id=" . $data['id'] . "'>Delete</a></td>";
        echo "</tr>";
    }
    ?>
</table><br><br>

<a href="logout.php" class="logout-btn">Logout</a>

<?php
}
?>

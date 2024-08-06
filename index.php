<?php
session_start();
include 'connect.php';

if(isset($_POST['submit'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sel = mysqli_query($con, "SELECT * FROM admin WHERE username='$user' AND password='$pass'");
    if(mysqli_num_rows($sel) > 0){
        $_SESSION['username'] = $user;
        
    
        setcookie('username', $user, time() + 3600, "/"); 
       

        header("Location: students.php");
        exit();
    } else {
        echo "<script>window.alert('Unknown Account')</script>";
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
    .col1 {
        float: left;
        width: 35%;
        color: blue;
        text-align: center;
        text-decoration: none;
        font-weight: bold;
        margin-top: 22px;
        font-size: 22px;
    }
    .cola {
        float: left;
        width: 25%;
        text-align: center;
    }
    .colb {
        float: right;
        width: 25%;
        text-align: center;
    }
    a {
        text-decoration: none;
        font-weight: bold;
        font-size: 30px;
    }
    a:hover {
        color: darkgreen;
        font-size: 33px;
        transition: 1s;
    }
</style>

<center>
    <div class="hd">
        <h1>STUDENTS MANAGEMENT SYSTEM</h1>
    </div><br><br><br>

    <h1 style="font-style:poppins, sans-serif;">LOGIN HERE!!!</h1>
    <fieldset style="width: 500px; background: green; border: 2px solid black; border-radius: 5px; margin-right: 50px;">
        <form action="index.php" method="POST">
            <p>USERNAME:</p>
            <input type="text" name="username" placeholder="Enter Username..." value="<?php echo isset($_COOKIE['username']) ? htmlspecialchars($_COOKIE['username']) : ''; ?>" required>
            <p>PASSWORD:</p>
            <input type="password" name="password" placeholder="Enter your password" required>
            <p>
                <input type="submit" name="submit" value="Login">
                <input type="reset" name="reset" value="Cancel">
            </p>
        </form>
    </fieldset>
</center>

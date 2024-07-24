<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
</head>

<body>
    <form action="signup.php" method="post" enctype="multipart/form-data">
        <label for="username">Username</label>
        <input type="text" name="username">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password">
        <br>
        <input type="submit" name="submit" value="Create Now">
    </form>
    <a href="login.php"><button>Login</button></a>

</body>
 
</html>

<?php

$servername = 'localhost';
$username = 'root';
$password = 'root';
$database = 'students';
$conn = new mysqli($servername, $username, $password, $database);

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "insert into login(username, password)
values('$username', '$password')";

    if (mysqli_query($conn, $query)) {
        echo "<script> alert(sign up successfully...)</script>";
    }
}

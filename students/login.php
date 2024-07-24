<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>

<body>
    <script>
        const error = <?php echo @$_GET['error']; ?>;
        if (error) {
            alert(error);
        }
    </script>

    <form action="login.php" method="post" enctype="multipart/form-data">
        <label for="username">Username</label>
        <input type="text" name="username">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password">
        <br>
        <input type="submit" name="login">
    </form>
    <a href="signup.php"><button>SignUp</button></a>
</body>

</html>
<?php
$servername = 'localhost';
$username = 'root';
$password = 'root';
$database = 'students';
$conn = new mysqli($servername, $username, $password, $database);

if (isset($_POST['login'])) {
    $name = $_SESSION['username'] = $_POST['username'];
    $admin_pass = $_POST['password'];

    $query = "select * from login where username= '$name' AND password= '$admin_pass'";

    $run = $conn->query($query);
    if (mysqli_num_rows($run) > 0) {
        echo "<script> window.open('index.php?logg=Login successfully...','_self')</script>";
    } else {
        echo "<script> alert('Password and Username does not match')</script>";
    }
}
?>
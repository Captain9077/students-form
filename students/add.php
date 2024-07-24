<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Details</title>
</head>
<style>
    body {
        padding: 0;
        margin: 0;
    }

    .nav {
        background: black;
        color: whitesmoke;
    }

    .details {
        display: table;
        margin: auto;
        justify-content: center;
        border: 2px solid black;
        padding: 10px;
        background-color: burlywood;
    }

    .details h2 {
        text-decoration: underline;
    }

    label {
        font-weight: bold;
    }

    input {
        width: 400px;
        height: 30px;
        font-size: large;
    }

    #submit {
        background: skyblue;
        width: 100px;
    }
</style>

<body>
    <div class="container">
        <div class="nav">
            <h1>Students Details</h1>
        </div>
        <div class="details">
            <h2>Create Students Details</h2>
            <form action="add.php" method="post" enctype="multipart/form-data">
                <label for="student_id">Student Roll.No</label> <br>
                <input type="text" name="student_id"> <br>
                <br>
                <label for="fname">Student First Name</label> <br>
                <input type="text" name="fname" id=""> <br>
                <br>
                <label for="lname">Student Last Name</label> <br>
                <input type="text" name="lname" id=""> <br>
                <br>
                <label for="email">Student Email</label> <br>
                <input type="email" name="email" id=""> <br>
                <br>
                <label for="phone_number">Phone Number</label> <br>
                <input type="number" name="phone_number" id=""> <br>
                <br>
                <label for="address">Student Address</label> <br>
                <input type="text" name="address" id=""> <br>
                <br>
                <label for="photo">Student Photo</label> <br>
                <input type="file" name="photo" id=""> <br>
                <br>
                <input type="submit" value="submit" name="submit" id="submit">
            </form>
        </div>
    </div>
</body>

</html>

<?php

$servername = 'localhost';
$username = 'root';
$password = 'root';
$database = 'Students';
$conn = new mysqli($servername, $username, $password, $database);

if (isset($_POST['submit'])) {
    $std_id = $_POST['student_id'];
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $student_mail = $_POST['email'];
    $number = $_POST['phone_number'];
    $std_address = $_POST['address'];
    $photo = $_FILES['photo']['name'];
    $photo_tmp = $_FILES['photo']['tmp_name'];

    if ($photo == 'null') {
        echo "image is required...";
    } else {
        move_uploaded_file($photo_tmp, "images/$photo");
    }

    $query = "insert into form(student_id, fname, lname, email, phone_number, address, photo)
    values('$std_id', '$first_name', '$last_name', '$student_mail', '$number', '$std_address', '$photo')";

    if(mysqli_query($conn, $query)){
        echo "<script> alert('data has been added...','_self')</script>";
    }
}

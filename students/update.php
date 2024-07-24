<?php
$servername = 'localhost';
$username = 'root';
$password = 'root';
$database = 'students';
$conn = new mysqli($servername, $username, $password, $database);

$edit = @$_GET['update'];
$query = "select * from form where student_id='$edit'";
$run = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($run)) {
    $edit_id = $row['student_id'];
    $first_name = $row[1];
    $last_name = $row[2];
    $student_mail = $row[3];
    $number = $row[4];
    $std_address = $row[5];
    $photo = $row[6];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>
<body>
    <form action="update.php?edit_form=<?php echo $edit_id; ?>" method="post" enctype="multipart/form-data">
        <label for="student_id">Student Roll.No</label> <br>
        <input type="text" name="student_id" value="<?php echo @$edit_id; ?>"> <br>
        <br>
        <label for="fname">Student First Name</label> <br>
        <input type="text" name="fname" value="<?php echo @$first_name; ?>"> <br>
        <br>
        <label for="lname">Student Last Name</label> <br>
        <input type="text" name="lname" value="<?php echo @$last_name; ?>"> <br>
        <br>
        <label for="email">Student Email</label> <br>
        <input type="email" name="email" value="<?php echo @$student_mail; ?>"> <br>
        <br>
        <label for="phone_number">Phone Number</label> <br>
        <input type="number" name="phone_number" value="<?php echo @$number; ?>"> <br>
        <br>
        <label for="address">Student Address</label> <br>
        <input type="text" name="address" value="<?php echo @$std_address; ?>"> <br>
        <br>
        <label for="photo">Student Photo</label> <br>
        <img src="images/<?php echo @$image; ?>" width="100" height="100">
        <input type="hidden" name="old_photo" value="<?php echo @$photo; ?>">
        <input type="file" name="photo" > <br>
        <br>
        <button type="submit" name="update">Update</button>
    </form>
</body>

</html>

<?php

$servername = 'localhost';
$username = 'root';
$password = 'root';
$database = 'Students';
$conn = new mysqli($servername, $username, $password, $database);

if (isset($_POST['update'])) {
    $std_id = $_POST['student_id'];
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $student_mail = $_POST['email'];
    $number = $_POST['phone_number'];
    $std_address = $_POST['address'];
    $photo = $_FILES['photo']['name'];
    $photo_tmp = $_FILES['photo']['tmp_name'];

    if ($_FILES['photo']['name']) {
        $photo = $_FILES['photo']['name'];
        $photo_tmp = $_FILES['photo']['tmp_name'];
        move_uploaded_file($photo_tmp, "images/$photo");
    } else {
        $photo = $_POST['old_photo'];
    }

    $query = "update form set student_id='$std_id', fname='$first_name', lname='$last_name', email='$student_mail', phone_number='$number', address='$std_address', photo='$photo' where student_id='$std_id'";

    if (mysqli_query($conn, $query)) {
        echo "<script> window.open('index.php?update= Data uploaded....','_self')</script>";
    } else {
        echo "error";
    }
}
?>
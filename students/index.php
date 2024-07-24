<?php

session_start();

if (!$_SESSION['username']) {
    header('location:login.php?error=You Are not admin');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .table {
        display: grid;
        margin: 200px auto;
        justify-content: center;
    }

    thead th {
        padding: 10px;
    }
    tbody td {
        padding: 10px;
        text-align: center;
    }
    #btn{
        display: inline;
    }
</style>

<body>
    <div class="container">
        <div class="table">
            <a href="add.php" id="btn"><button>Add</button></a>
            <a href="logout.php" id="btn"><button>logout</button></a>
            <h3><?php echo @$_GET['update'] ?></h3>
            <h3><?php echo @$_GET['deleted'] ?></h3>
            <table border="2">
                <thead>
                    <tr>
                        <th>student_id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>email</th>
                        <th>phone_number</th>
                        <th>address</th>
                        <th>photo</th>
                        <th>edit</th>
                        <th>delete</th>
                    </tr>
                </thead>
        </div>
    </div>
</body>

</html>

<?php
$servername = 'localhost';
$username = 'root';
$password = 'root';
$database = 'students';
$conn = new mysqli($servername, $username, $password, $database);

$que = "select * from form";
$run = mysqli_query($conn, $que);

while ($row = mysqli_fetch_array($run)) {
    $std_id = $row['student_id'];
    $first_name = $row['fname'];
    $last_name = $row['lname'];
    $student_mail = $row['email'];
    $number = $row['phone_number'];
    $std_address = $row['address'];
    $photo = $row['photo'];
?>

    <tbody>
        <tr>
            <td>
                <?php echo $std_id; ?>
            </td>
            <td>
                <?php echo $first_name; ?>
            </td>
            <td>
                <?php echo $last_name; ?>
            </td>
            <td>
                <?php echo $student_mail; ?>
            </td>
            <td>
                <?php echo $number; ?>
            </td>
            <td>
                <?php echo $std_address; ?>
            </td>
            <td>
                <img src="images/<?php echo $photo; ?>" width="100" height="100">
            </td>
            <td>
                <button type="button"> <a href="update.php?update=<?php echo $std_id; ?>">Edit</a></button>
            </td>
            <td>
                <button type="button"><a href="delete.php?del=<?php echo $std_id; ?>">Delete</a></button>
            </td>
        </tr>

    </tbody>
<?php } ?>
</table>
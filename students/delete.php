<?php
$servername = 'localhost';
$username = 'root';
$password = 'root';
$database = 'Students';
$conn = new mysqli($servername, $username, $password, $database);

$delete = $_GET['del'];
$query = "delete from form where student_id = '$delete'";

if (mysqli_query($conn, $query)) {
    echo "<script> window.open('index.php?deleted=Record has been deleted successfully...','_self')</script>";
}

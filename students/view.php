<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
</head>

<body>
    <form action="view.php" method="get">
        <label for="search">Search</label>
        <input type="search" name="search">
        <br>
        <input type="submit" name="submit" value="Find now">
    </form>

    <?php
    $servername = 'localhost';
    $username = 'root';
    $password = 'root';
    $database = 'students';
    $conn = new mysqli($servername, $username, $password, $database);

    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $query = "select * from form where student_id='$search' OR fname='$search' OR lname='$search'";
        $run = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($run)) {
            $id = $row[0];
            $fname = $row[1];
            $lname = $row[2];
            $mail = $row[3];
            $photo = $row[4];
    ?>
            <table>
                <tr>
                    <td>
                        <?php echo $id; ?>
                    </td>
                    <td>
                        <?php echo $fname; ?>
                    </td>
                    <td>
                        <?php echo $lname; ?>
                    </td>
                    <td>
                        <?php echo $mail; ?>
                    </td>
                    <td>
                        <img src="images/<?php echo $photo; ?>" width="100" height="100">
                    </td>
                </tr>
            </table>

    <?php }
    } ?>

</body>

</html>
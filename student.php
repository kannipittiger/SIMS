<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Your Page Title</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Student Information</h1>
        <!-- Display student information table -->
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "students";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        $sql = "SELECT * FROM `std_info`";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                echo '<table class="table table-bordered table-striped">';
                echo '<thead class="thead-dark">';
                echo '<tr><th>ID</th><th>Name</th><th>Surname</th>';
                echo '<th>ชื่อ</th><th>นามสกุล</th>';
                echo '<th>Major</th><th>Email</th>';
                echo '<th>Delete</th><th>Edit</th></tr>';
                echo '</thead>';
                echo '<tbody>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row["id"] . '</td>';
                    echo '<td>' . $row["en_name"] . '</td>';
                    echo '<td>' . $row["en_surname"] . '</td>';
                    echo '<td>' . $row["th_name"] . '</td>';
                    echo '<td>' . $row["th_surname"] . '</td>';
                    echo '<td>' . $row["major_code"] . '</td>';
                    echo '<td>' . $row["email"] . '</td>';
                    echo '<td><a class="btn btn-danger" href="delete_std.php?id=' . $row["id"] . '">Delete</a></td>';
                    echo '<td><a class="btn btn-warning" href="update_std_form.php?id=' . $row["id"] . '">Edit</a></td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            }
        }
        mysqli_close($conn);
        ?>
        <div class="mt-4">
            <button class="btn btn-success"><a href='./insert_std_form.html' class="text-white text-decoration-none">Insert new record</a></button>
        </div>
    </div>
</body>
</html>

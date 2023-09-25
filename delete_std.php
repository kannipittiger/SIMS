<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Delete Student Record</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Delete Student Record</h1>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "students";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        $id = $_GET['id'];

        // sql to delete a record
        $sql = "DELETE FROM `std_info` WHERE `id`='$id'";
        if (mysqli_query($conn, $sql)) {
            echo '<div class="alert alert-success" role="alert">Record deleted successfully</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Error deleting record: ' . mysqli_error($conn) . '</div>';
        }
        mysqli_close($conn);
        ?>
        <div class="mt-3">
            <a href="student.php" class="btn btn-primary">Back to Student List</a>
        </div>
    </div>
</body>
</html>

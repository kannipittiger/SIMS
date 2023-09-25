<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update Student Record</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Update Student Record</h1>
        <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "students";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        $old_id = $_GET["id"];
        $id = $_GET["id"];
        $sql = "SELECT * FROM std_info WHERE id= $id";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die('<div class="alert alert-danger" role="alert">Error fetching record: ' . mysqli_error($conn) . '</div>');
        }

        $row = mysqli_fetch_assoc($result);
        mysqli_close($conn);
        ?>

        <form method="post" action="./update_std.php">
            <input type="hidden" name="old_id" value="<?php echo $old_id ?>">
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" name="id" value="<?php echo $row["id"] ?>">
            </div>
            <div class="mb-3">
                <label for="en_name" class="form-label">Name (English)</label>
                <input type="text" class="form-control" name="en_name" value="<?php echo $row["en_name"] ?>">
            </div>
            <div class="mb-3">
                <label for="en_surname" class="form-label">Surname (English)</label>
                <input type="text" class="form-control" name="en_surname" value="<?php echo $row["en_surname"] ?>">
            </div>
            <div class="mb-3">
                <label for="th_name" class="form-label">ชื่อ (ภาษาไทย)</label>
                <input type="text" class="form-control" name="th_name" value="<?php echo $row["th_name"] ?>">
            </div>
            <div class="mb-3">
                <label for="th_surname" class="form-label">นามสกุล (ภาษาไทย)</label>
                <input type="text" class="form-control" name="th_surname" value="<?php echo $row["th_surname"] ?>">
            </div>
            <div class="mb-3">
                <label for="major_code" class="form-label">Major</label>
                <input type="text" class="form-control" name="major_code" value="<?php echo $row["major_code"] ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="<?php echo $row["email"] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a class='btn btn-danger mt-3' href='./student.php'>Back</a>
    </div>
</body>
</html>

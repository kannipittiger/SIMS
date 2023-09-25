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
        $old_id = htmlspecialchars(trim($_POST["old_id"]));
        $id = htmlspecialchars(trim($_POST["id"]));
        $en_name = htmlspecialchars(trim($_POST["en_name"]));
        $en_surname = htmlspecialchars(trim($_POST["en_surname"]));
        $th_name = htmlspecialchars(trim($_POST["th_name"]));
        $th_surname = htmlspecialchars(trim($_POST["th_surname"]));
        $major_code = htmlspecialchars(trim($_POST["major_code"]));
        $email = htmlspecialchars(trim($_POST["email"]));

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "students";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check if any input is empty
        if (empty($id) || empty($en_name) || empty($en_surname) || empty($th_name) || empty($th_surname) || empty($major_code) || empty($email)) {
            if (empty($id)) {
                echo '<div class="alert alert-danger" role="alert">ลืมกรอกid</div>';
            } else if (!is_numeric($id)) {
              echo '<div class="alert alert-danger" role="alert">ใส่idเป็นตัวเลข</div>';
            }
            if (empty($en_name)) {
                echo '<div class="alert alert-danger" role="alert">ลืมกรอกชื่อภาษาอังกฤษ</div>';
            }
            if (empty($en_surname)) {
                echo '<div class="alert alert-danger" role="alert">ลืมกรอกนามสกุลภาษาอังกฤษ</div>';
            }
            if (empty($th_name)) {
                echo '<div class="alert alert-danger" role="alert">ลืมกรอกชื่อภาษาไทย</div>';
            }
            if (empty($th_surname)) {
                echo '<div class="alert alert-danger" role="alert">ลืมกรอกนามสกุลภาษาไทย</div>';
            }
            if (empty($major_code)) {
                echo '<div class="alert alert-danger" role="alert">ลืมกรอกรหัสสาขา</div>';
            }
            if (empty($email)) {
                echo '<div class="alert alert-danger" role="alert">ลืมกรอกemail</div>';
            }
            echo "<br><a class='btn btn-secondary' href='update_std_form.php?id=$old_id'>Back</a>";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<div class="alert alert-danger" role="alert">ใส่อีเมลผิดอ่ะพิมใหม่ให้หน่อย</div>';
            echo "<br><a class='btn btn-secondary' href='update_std_form.php?id=$old_id'>Back</a>";
        } else {
            $sql = "UPDATE `std_info` SET `id`='$id',`en_name`='$en_name',`en_surname`='$en_surname',`th_name`='$th_name',`th_surname`='$th_surname',`major_code`='$major_code',`email`='$email' WHERE `id`='$old_id'";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo '<div class="alert alert-success" role="alert">Record updated successfully</div>';
                echo "<br>ID : $id</br>";
                echo "<a class='btn btn-primary' href='student.php'>Back to Student List</a>";
            } else {
                echo '<div class="alert alert-danger" role="alert">Error updating record: ' . mysqli_error($conn) . '</div>';
            }
        }

        mysqli_close($conn);
        ?>
    </div>
</body>
</html>

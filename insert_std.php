<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Insert Student Record</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Insert Student Record</h1>
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');

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
        // create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (empty($id) || empty($en_name) || empty($en_surname) || empty($th_name) || empty($th_surname) || empty($major_code) || empty($email)) {
            if (empty($id)) {
                echo '<div class="alert alert-danger" role="alert">ลืมกรอก ID</div>';
            } else if (!is_numeric($id)){
                echo '<div class="alert alert-danger" role="alert">ใส่เป็นตัวเลข</div>';
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
                echo '<div class="alert alert-danger" role="alert">ลืมกรอก Email</div>';
            }
            echo '<br><button class="btn btn-primary"><a href="insert_std_form.html" style="color: white;">Back</a></button>';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<div class="alert alert-danger" role="alert">ใส่อีเมลผิดอ่ะ กรุณาพิมใหม่</div>';
            echo '<br><button class="btn btn-primary"><a href="./insert_std_form.html" style="color: white;">Back</a></button>';
        } else {
            $sql = "INSERT INTO `std_info` (`id`, `en_name`, `en_surname`, `th_name`, `th_surname`, `major_code`, `email`) VALUES ('$id', '$en_name', '$en_surname', '$th_name', '$th_surname', '$major_code', '$email')";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<div class="alert alert-success" role="alert">New record created successfully!</div>';
                echo '<button class="btn btn-primary"><a href="student.php" style="color: white;">Back</a></button>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error: ' . $sql . '<br>' . mysqli_error($conn) . '</div>';
            }
        }
        mysqli_close($conn);
        ?>
    </div>
</html>

<?php
$old_id = trim($_POST["old_id"]);
$id = trim($_POST["id"]);
$en_name = trim($_POST["en_name"]);
$en_surname = trim($_POST["en_surname"]);
$th_name = trim($_POST["th_name"]);
$th_surname = trim($_POST["th_surname"]);
$major_code = trim($_POST["major_code"]);
$email = trim($_POST["email"]);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if any input is empty
if(empty($id) || empty($en_name) || empty($en_surname) || empty($th_name) || empty($th_surname) || empty($major_code) || empty($email)){
  if (!is_numeric($id))  {
    echo "ใส่idเป็นตัวเลข</br>";
  } 
  if (empty($id) ) {
    echo "ลืมกรอกid</br>";
  } 
  if (empty($en_name)) {
    echo "ลืมกรอกชื่อภาษาอังกฤษ</br>";
  }
  if (empty($en_surname)) {
    echo "ลืมกรอกนามสกุลภาษาอังกฤษ</br>";
  }if (empty($th_name)) {
    echo "ลืมกรอกชื่อภาษาไทย</br>";
  }if (empty($th_surname)) {
    echo "ลืมกรอกนามสกุลภาษาไทย</br>";
  }if (empty($major_code)) {
    echo "ลืมกรอกรหัสสาขา</br>";
  }if (empty($email)) {
    echo "ลืมกรอกemail</br>";
  }
  echo "<br><button><a href='update_std_form.php?id=$old_id'>Back</a></button>";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "ใส่อีเมลผิดอ่ะพิมใหม่ให้หน่อย";
  echo "<br><button><a href='update_std_form.php?id=$old_id'>Back</a></button>";
} else {
    $sql = "UPDATE `std_info` SET `id`='$id',`en_name`='$en_name',`en_surname`='$en_surname',`th_name`='$th_name',`th_surname`='$th_surname',`major_code`='$major_code',`email`='$email' WHERE `id`='$old_id'";
    
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        echo "Record updated successfully";
        echo "<br>ID : $id</br>";
        echo "<button><a href='student.php'>Back</a></button>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

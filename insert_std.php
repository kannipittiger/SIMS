<?php
$id=$_POST["id"];
$en_name=$_POST["en_name"];
$en_surname=$_POST["en_surname"];
$th_name=$_POST["th_name"];
$th_surname=$_POST["th_surname"];
$major_code=$_POST["major_code"];
$email=$_POST["email"];
//echo $id; echo $en_name; echo $en_surname; echo $th_name; echo $th_surname;
//echo $major_code; echo $email;
$servername="localhost";
$username="root";
$password="";
$dbname="students";
// create connection
$conn=mysqli_connect($servername,$username,$password,$dbname);

if(empty($id) || empty($en_name) || empty($en_surname) || empty($th_name) || empty($th_surname) || empty($major_code) || empty($email)){
    if (empty($id) ) {
      echo "ลืมกรอกid</br>";
    } 
    if (!is_numeric($id))  {
        echo "ใส่idเป็นตัวเลข</br>";
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
    echo "<br><button><a href='insert_std_form.html'>Back</a></button>";
}else if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strpos($email, '@') === false) {
    echo "ใส่อีเมลผิดอ่ะพิมใหม่ให้หน่อย";
    echo "<br><button><a href='./insert_std_form.html'>Back</a></button>";
} else {
$sql="INSERT INTO `std_info` (`id`, `en_name`, `en_surname`, `th_name`, `th_surname`, `major_code`, `email`) VALUES ('$id', '$en_name', '$en_surname', '$th_name', '$th_surname', '$major_code', '$email')";
//echo $sql."<br>";
$result=mysqli_query($conn,$sql);
if($result){
    echo "New record created successfully!</br><button><a href='student.php'>Back</a></button>";
}
else echo "Error: ".$sql."<br>".mysqli_error($conn);
}
mysqli_close($conn);
?>
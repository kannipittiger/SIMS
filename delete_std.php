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
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
echo "</br><button><a href='student.php'>Back</a></button>";
mysqli_close($conn);
?>
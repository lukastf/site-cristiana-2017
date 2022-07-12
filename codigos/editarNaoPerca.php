<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "banco";

$naoperca = $_POST['naoperca'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE naoperca SET naoperca='$naoperca' WHERE naoperca=naoperca";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
    header( "refresh:3;url=../index.php" );
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
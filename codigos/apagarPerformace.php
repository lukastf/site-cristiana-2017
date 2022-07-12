<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "banco";
$performaceid = $_POST['performaceid'];
$performaceint = (int)$performaceid;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sqlFormato = "SELECT formato FROM performace WHERE id_performace = '$performaceint'";
$db = mysqli_select_db($conn,'banco');
$fmt = mysqli_query($conn, $sqlFormato);
$formatorow = mysqli_fetch_assoc($fmt);
$formato = $formatorow["formato"];

if (array_key_exists('performaceid', $_POST)) {
  $filename = $_POST['performaceid'];
  $filename = "../performace/" . $filename . "." . $formato;
  if (file_exists($filename)) {
    unlink($filename);
    echo 'File '.$filename.' has been deleted';
  } else {
    echo 'Could not delete '.$filename.', file does not exist';
  }
}

// sql to delete a record
$sql = "DELETE FROM performace WHERE id_performace = $performaceid";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";

    header("Location: performace.php");
    
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

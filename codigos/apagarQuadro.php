<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "banco";
$quadroid = $_POST['quadroid'];
$quadroint = (int)$quadroid;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sqlFormato = "SELECT formato FROM quadros WHERE id_quadro = '$quadroint'";
$db = mysqli_select_db($conn,'banco');
$fmt = mysqli_query($conn, $sqlFormato);
$formatorow = mysqli_fetch_assoc($fmt);
$formato = $formatorow["formato"];

if (array_key_exists('quadroid', $_POST)) {
  $filename = $_POST['quadroid'];
  $filename = "imgs/" . $filename . "." . $formato;
  if (file_exists($filename)) {
    unlink($filename);
    echo 'File '.$filename.' has been deleted';
  } else {
    echo 'Could not delete '.$filename.', file does not exist';
  }
}

// sql to delete a record
$sql = "DELETE FROM quadros WHERE id_quadro = $quadroid";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";

    header("Location: ../index.php");
    
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

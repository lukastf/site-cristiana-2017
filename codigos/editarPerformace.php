<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "banco";

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$performaceid = $_POST['performaceid'];
$performaceint = (int)$performaceid;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE performace SET nome='$nome', descricao='$descricao' WHERE id_performace='$performaceint'";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
    header("Location: performace.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
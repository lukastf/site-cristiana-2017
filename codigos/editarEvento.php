<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "banco";

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$data = $_POST['data'];
$eventoid = $_POST['eventoid'];
$eventoint = (int)$eventoid;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE eventos SET nome='$nome', descricao='$descricao', data='$data' WHERE id_evento='$eventoint'";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
    header("Location: eventos.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
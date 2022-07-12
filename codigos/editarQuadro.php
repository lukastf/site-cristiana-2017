<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "banco";

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$quadroid = $_POST['quadroid'];
$quadroint = (int)$quadroid;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE quadros SET nome='$nome', descricao='$descricao' WHERE id_quadro='$quadroint'";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
    header("Location: ../index.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
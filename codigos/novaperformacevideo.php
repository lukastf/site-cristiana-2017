<?php
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$link = $_POST['link'];
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "banco";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$temp1 = explode("=", $link);
$linkkey = end($temp1);

$sql = "INSERT INTO performace (nome, descricao, link, video)
VALUES ('$nome', '$descricao', '$linkkey','1')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: performace.php");
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
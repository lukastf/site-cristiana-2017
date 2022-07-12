<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "banco";
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = MD5($_POST['senha']);

try {
    
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create connection
    $conne = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conne) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sqlverifica = mysqli_query($conne,"SELECT email FROM usuarios WHERE email = '$email'");

    if(mysqli_num_rows($sqlverifica) >= 1){
    echo "<h1>Email EM USO!<h1>";
    header( "refresh:5;url=../index.php" );
    }
    else{

    $sql = "INSERT INTO usuarios (nome, email, senha)
    VALUES ('$nome', '$email', '$senha')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    header("Location: ../index.php");
    }
}
catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
mysqli_close($conne);
//header("Location: localhost:8090/site/index.php"); /* Redirect browser */
//exit();
//echo "<meta http-equiv='refresh' content='0'>";
//echo "<script>document.getElementById('formCadastro').reset();<script>";
?>

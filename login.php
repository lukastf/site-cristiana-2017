<?php
// Start the session
//session_start();

// Set session variables
//$_SESSION["nome"] = $_POST['nome'];
//$_SESSION["email"] = $_POST['email'];
//$_SESSION["senha"] = MD5($_POST['senha']);

$email = $_POST['email'];
$entrar = $_POST['entrar'];
$senha = md5($_POST['senha']);
//$admin = $_POST['admin'];
$connect = mysqli_connect('localhost','root','password');
$db = mysqli_select_db($connect,'banco');
if (isset($entrar)) {
  $verifica = mysqli_query($connect,"SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'") or die("erro ao selecionar");
  if (mysqli_num_rows($verifica)<=0){
      echo"<script>alert('Login e/ou senha incorretos');window.location.href='index.php';</script>";
      die();
  }else{
      setcookie("email",$email);
      //setcookie("admin",$admin);
      header("Location: index.php");
      }
  }
mysqli_close($connect);
?>
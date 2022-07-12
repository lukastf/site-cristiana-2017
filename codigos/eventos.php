<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <title>Atelier Cristiana de Freitas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="validator.min.js"></script>
</head>
<body>
<?php
echo'
<div class="container-fluid">
<div class="row"> 
  <div class="col-xs-3" style="background-color:white;">
    <img class="img-responsive" src="../logo.png" alt="Atelier Cristiana de Freitas" width="250" height="250" style="margin-top: 20px; margin-left: 20px;">
<div class="container-fluid " style="margin-top: 20px;">
    <ul class="nav nav-pills nav-stacked">
      <li><a href="../index.php">Inicio</a></li>
      <li><a href="#" data-toggle="modal" data-target="#sobre">Sobre</a></li>
      <li class="active dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Portifólio <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Obras</a></li>
          <li class="active"><a href="eventos.php">Eventos</a></li>
          <li><a href="performace.php">Performace</a></li>                        
        </ul>
      </li>
      <li><a href="#" data-toggle="modal" data-target="#naoperca">Não Perca</a></li>';
      if(isset($_COOKIE['email'])){
        $email = $_COOKIE['email'];
        $connect = mysqli_connect('localhost','root','password');
        $db = mysqli_select_db($connect,'banco');
        $verifica = mysqli_query($connect,"SELECT nome, email, admin FROM usuarios WHERE email = '$email'") or die("erro ao selecionar");
        $row=mysqli_fetch_assoc($verifica);

        if($row["admin"] == 1){
          echo'<li><a href="#" data-toggle="modal" data-target="#novoevento">Novo Evento</a></li>';
        }
      }
    echo'</ul>
</div>
  </div>';

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

$sql = "SELECT * FROM eventos";
$result = mysqli_query($conn, $sql);

if(isset($_COOKIE['email'])){
$email = $_COOKIE['email'];
$sql2 = "SELECT nome, email, admin FROM usuarios WHERE email = '$email'";
$result2 = mysqli_query($conn, $sql2);
$rowUsuarios=mysqli_fetch_assoc($result2);
}

$cnt = 0;
$modal = 0;
if (mysqli_num_rows($result) > 0) {
     // output data of each row
     while($row = mysqli_fetch_assoc($result)) {

       if($cnt == 3){
         echo "</div>";
         echo '<div class="row"></div>';
         $cnt++;
       }

       if($cnt == 0 || $cnt == 1 || $cnt == 2){
         echo "<div class='col-xs-3'>";
         echo "<div class ='thumbnail' style='margin-top: 20px;'>";
         echo '<img class="img-responsive" src="../eventos/' . $row["id_evento"] . '.' . $row["formato"] . '" alt="" width="400" height="400" data-toggle="modal" data-target="#abrirEvento'.$modal.'">' ."<h3>Nome: " . $row["nome"]. "</h3> <h4> Data: " . $row["data"]. " </h4>" . "<br>";
         echo "</div>";
         echo "</div>";
         $cnt++;
       }

       if($cnt == 4 || $cnt == 5 || $cnt == 6 || $cnt == 7){
         echo "<div class='col-xs-3'>";
         echo "<div class ='thumbnail'>";
         echo '<img class="img-responsive" src="../eventos/' . $row["id_evento"] . '.' . $row["formato"] . '" alt="" width="400" height="400" data-toggle="modal" data-target="#abrirEvento'.$modal.'">' ."<h3>Nome: " . $row["nome"]. "</h3> <h4> Data: " . $row["data"]. " </h4>" . "<br>";
         echo "</div>";
         echo "</div>";
         $cnt++;
       }

       if($cnt == 8){
         echo '<div class="row"></div>';
         $cnt = 4;
       }

echo '<!-- Modal -->';
echo '<div id="abrirEvento'.$modal.'" class="modal fade" role="dialog">';
echo '  <div class="modal-dialog">';

echo '  <!-- Modal content-->';
echo '  <div class="modal-content">';

echo '    <div class="modal-header">';
echo '       <button type="button" class="close" data-dismiss="modal">&times;</button>';
echo '      <h4 class="modal-title">'.$row["nome"].' ('.$row["data"].')</h4>';
echo '     </div>';
echo '     <div class="modal-body">';
echo '      <img class="img-responsive" src="../eventos/' . $row["id_evento"] . '.' . $row["formato"] . '">';
echo '     <br>';
echo '     <h4>'.$row["descricao"].'</h4>';
echo '     </div>';
echo '     <div class="modal-footer">';
if(isset($_COOKIE['email'])){
if($rowUsuarios["admin"] == 1){
echo '  <form class="col-xs-1" id="apagarEvento'.$modal.'" role="form" method="POST" action="apagarEvento.php">';
echo '       <button type="submit" class="btn btn-danger" name="eventoid" value="'.$row["id_evento"].'">Apagar</button>';
echo '  </form>';
echo '       <button type="button" class="btn btn-primary" name="editar" data-dismiss="modal" data-toggle="modal" data-target="#editarQdr'.$modal.'">Editar</button>';
}
}
echo '       <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>';

echo '     </div>';
echo '    </div>';

echo ' </div>';
echo '</div>';

echo '<!-- Modal -->';
echo '<div id="editarQdr'.$modal.'" class="modal fade" role="dialog">';
echo '  <div class="modal-dialog">';

echo '   <!-- Modal content-->';
echo '    <div class="modal-content">';
echo '    <form id="formEditar" data-toggle="validator" role="form" method="POST" action="editarEvento.php">';
echo '      <div class="modal-header">';
echo '        <button type="button" class="close" data-dismiss="modal">&times;</button>';
echo '       <h4 class="modal-title">Editar: '.$row["nome"].'</h4>';
echo '     </div>';
echo '      <div class="modal-body">';
echo '            <div class="form-group">';
echo '             <label for="name" class="control-label">Nome do evento:</label>';
echo '              <input name="nome" type="text" class="form-control" id="name" value="'.$row["nome"].'" placeholder="Digite o nome do evento" required>';
echo '              <div class="help-block with-errors"></div>';
echo '           </div>';
echo '            <div class="form-group">';
echo '              <label for="name" class="control-label">Descrição:</label>';
echo '             <input name="descricao" type="text" class="form-control" id="descricao" value="'.$row["descricao"].'" placeholder="Digite uma descrição do evento" required>';
echo '              <div class="help-block with-errors"></div>';
echo '            </div>';
echo '            <div class="form-group">';
echo '              <label for="name" class="control-label">Data:</label>';
echo '             <input name="data" type="text" class="form-control" id="data" value="'.$row["data"].'" placeholder="Digite uma data do evento" maxlength="10" required>';
echo '              <div class="help-block with-errors"></div>';
echo '            </div>';
echo '     </div>';
echo '      <div class="modal-footer">';
echo '        <button type="submit" name="eventoid" value="'.$row["id_evento"].'" class="btn btn-primary">Editar</button>';
echo '        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>';
echo '      </div>';
echo '    </div>';
echo '    </form>';
echo '  </div>';
echo '</div>';

$modal++;
       
     }
} else {
     echo "0 results";
}

mysqli_close($conn);
?>

<!-- Modal Sobre-->
  <div class="modal fade" id="sobre" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sobre</h4>
        </div>
        <div class="modal-body">

          <?php
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

$sql = "SELECT sobre FROM sobre";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "" . $row["sobre"]. "";
        $sobre = $row["sobre"];
    }
} else {
    echo "0 resultados";
}


        echo '</div>
        <div class="modal-footer">';

        if(isset($_COOKIE['email'])){
        $email = $_COOKIE['email'];
        $verifica = mysqli_query($conn,"SELECT admin FROM usuarios WHERE email = '$email'") or die("erro ao selecionar");
        $row2=mysqli_fetch_assoc($verifica);

        
        if($row2["admin"] == 1){
          echo '<button type="button" class="btn btn-primary" name="editarsobre" data-dismiss="modal" data-toggle="modal" data-target="#editarSobre">Editar</button>';
        }
        
        }
        echo'
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="editarSobre" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      <form id="formSobre" data-toggle="validator" role="form" method="POST" action="editarSobre.php">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sobre</h4>
        </div>
        <div class="modal-body">
          <textarea class="form-control" rows="5" id="comment" style = "resize: none;" name="sobre">'.$sobre.'</textarea>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="editarSobre">Editar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </form>
      </div>
      
    </div>
  </div>';

mysqli_close($conn);
?>

<!-- Modal Não Perca-->
  <div class="modal fade" id="naoperca" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Não Perca</h4>
        </div>
        <div class="modal-body">

          <?php
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

$sql = "SELECT naoperca FROM naoperca";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "" . $row["naoperca"]. "";
        $naoperca = $row["naoperca"];
    }
} else {
    echo "0 resultados";
}


        echo '</div>
        <div class="modal-footer">';

        if(isset($_COOKIE['email'])){
        $email = $_COOKIE['email'];
        $verifica = mysqli_query($conn,"SELECT admin FROM usuarios WHERE email = '$email'") or die("erro ao selecionar");
        $row2=mysqli_fetch_assoc($verifica);

        
        if($row2["admin"] == 1){
          echo '<button type="button" class="btn btn-primary" name="editarNaoPerca" data-dismiss="modal" data-toggle="modal" data-target="#editarNaoPerca">Editar</button>';
        }
        
        }
        echo'
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="editarNaoPerca" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      <form id="formNaoPerca" data-toggle="validator" role="form" method="POST" action="editarNaoPerca.php">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Não Perca</h4>
        </div>
        <div class="modal-body">
          <textarea class="form-control" rows="5" id="comment" style = "resize: none;" name = "naoperca">'.$naoperca.'</textarea>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="editarNaoPerca">Editar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </form>
      </div>
      
    </div>
  </div>';

mysqli_close($conn);
?>

<div class="modal fade" id="novoevento" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Novo Evento</h4>
          </div>
          <div class="modal-body">
          <form id="formCadastro" data-toggle="validator" role="form" method="POST" action="novoevento.php" enctype="multipart/form-data">
            <div class="form-group">
              Selecione uma imagem para enviar:
              <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <div class="form-group">
              <label for="name" class="control-label">Nome do evento:</label>
              <input name="nome" type="text" class="form-control" id="name" placeholder="Digite o nome do evento" required>
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
              <label for="name" class="control-label">Descrição:</label>
              <input name="descricao" type="text" class="form-control" id="descricao" placeholder="Digite uma descrição do evento" required>
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
              <label for="name" class="control-label">Data:</label>
              <input name="data" type="text" class="form-control" id="data" placeholder="Digite a data do evento" maxlength="10" required>
              <div class="help-block with-errors"></div>
            </div>
            <div class="modal-footer">
            <input type="submit" value="Upload Evento" name="upload" class="btn btn-primary">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
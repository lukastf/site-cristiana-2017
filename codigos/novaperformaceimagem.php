<?php
//include 'vars.php';


$target_dir = "../performace/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "banco";

// Check if image file is a actual image or fake image
if(isset($_POST["uploadimg"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    header( "refresh:5;url=performace.php" );
// if everything is ok, try to upload file
} else {
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $temp1 = explode(".", $_FILES["fileToUpload"]["name"]);
    $formato = end($temp1);

    $sql = "INSERT INTO performace (nome, descricao, formato , video)
    VALUES ('$nome', '$descricao', '$formato', '0')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    $sql2 = "SELECT id_performace FROM performace ORDER BY id_performace DESC LIMIT 1";

    $lol = mysqli_query($conn, $sql2);

    $row = mysqli_fetch_assoc($lol);

    $indexFt = $row['id_performace'];

    mysqli_close($conn);

    $temp2 = explode(".", $_FILES["fileToUpload"]["name"]);
    $newfilename = "../performace/" . "$indexFt" . '.' . end($temp2);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newfilename)) {

        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

        header("Location: performace.php");
        
    } else {
        echo "Sorry, there was an error uploading your file.";
        header( "refresh:3;url=performace.php" );
    }
}


?>
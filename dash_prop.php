<?php

$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "proyecto"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if(isset($_POST['rut']) && isset($_POST['nombres']) && isset($_POST['fec_nac']) && isset($_POST['email']) && isset($_POST['clave']) && isset($_POST['sexo']) 
  && isset($_POST['telefono']) && isset($_POST['n_propiedad'])) {
    $rut = $_POST['rut'];
    $nombres = $_POST['nombres'];
    $fec_nac = $_POST['fec_nac'];
    $email = $_POST['email'];
    $clave = $_POST['clave'];
    $sexo = $_POST['sexo'];
    $telefono = $_POST['telefono'];
    $n_propiedad = $_POST['n_propiedad'];


    $sql = "INSERT INTO usuarios (rut, nombres, fec_nac, email, clave, sexo, telefono, n_propiedad) 
    VALUES ('$rut', '$nombres', '$fec_nac', '$email', '$clave', '$sexo', '$telefono', '$n_propiedad')";
    
    if ($conn->query($sql) === TRUE) {
      echo '<script>alert("Registro insertado correctamente");window.location="index.php"</script>';
    } else {
      echo '<script>alert("Error al insertar registro: ' . $conn->error . '");</script>';
    } 
  } else {
    echo '<script>alert("No se han enviado todos los datos necesarios");</script>';
  }
  
}

?>
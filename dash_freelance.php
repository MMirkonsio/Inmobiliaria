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
  && isset($_POST['telefono']) && isset($_FILES['cer_ant'])) {

    $rut = $_POST['rut'];
    $nombres = $_POST['nombres'];
    $fec_nac = $_POST['fec_nac'];
    $email = $_POST['email'];
    $clave = $_POST['clave'];
    $sexo = $_POST['sexo'];
    $telefono = $_POST['telefono'];
    $cer_ant = $_FILES['cer_ant'];

    if (isset($_FILES['cer_ant'])) {
      $file_name = $_FILES['cer_ant']['name'];
      $file_tmp = $_FILES['cer_ant']['tmp_name'];
      $file_size = $_FILES['cer_ant']['size'];
      $file_type = $_FILES['cer_ant']['type'];
      
      $target_dir = "target_dir/";
      $target_file = $target_dir . basename($file_name);
      move_uploaded_file($file_tmp, $target_file);
      
      $sql = "INSERT INTO usuarios (rut, nombres, fec_nac, email, clave, sexo, telefono, cer_ant) 
      VALUES ('$rut', '$nombres', '$fec_nac', '$email', '$clave', '$sexo', '$telefono', '$target_file')"; /*posiblemente se tenga que agregar $cer_ant */
      
      if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Registro insertado correctamente");window.location="index.php"</script>';
      } else {
        echo '<script>alert("Error al insertar registro: ' . $conn->error . '");</script>';
      }
    } else {
      echo '<script>alert("No se ha enviado el archivo de certificado de antecedentes");</script>';
    }
    
  }
}
?>
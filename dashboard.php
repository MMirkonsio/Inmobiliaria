<?php

session_start();

if(isset($_SESSION['usuario']))
{

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login de Autenticación Sistema PENKA LTDA</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link href="css/miestilo.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<div  class="background" ></div>
<body>
   <div id="imagen_logo"><img src="imagenes/LOGO2.png" style="position: absolute; top: 0; left: 0;"></div>
   <br>
   <div id="datosusu">
      <br>
      <?php echo "Bienvenido: ".$_SESSION['usuario'];?><img class="posi_icono" src="imagenes/icono1.png">
   </div>
   
      <a href="cerrar.php"><img class="posi_cerrar" src="imagenes/exit.png">Cerrar Sesión</a>
  
   <br>
   <div id="caja_crud"><a href="formulariousuario.php">
      <br>
      <br>
      <img src="imagenes/team1.png"><br>Mantenedor De Usuarios</a></div>

   <div id="caja_crud2"><a href="CRUD_Propiedades.php">
      <br>
      <br>
      <img src="imagenes/casa2.png"><br>Mantenedor De Propiedades</a></div>


</body>
</html>
<?php
}
else
{
    echo "Sin Acceso.";
}
?>


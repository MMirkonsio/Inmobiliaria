<?php

session_start();

?>


<!DOCTYPE html>
<html>
<head>
<title>Propiedades</title>
<meta charset="UTF-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link href="css/miestilo.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<div  class="background">
<body>
<?php

include("functions/setup.php");

?>
        <div class="card">
        
            <div class="row">
                <div class="col-sm-6">
                    <label style="font-size:24px; font-weight: bold;">Listado de Propiedades <b>(<?php echo contarprop();?>&nbsp;Propiedades)</b></label>
                    <input type="button" id="botonprop" value="Volver" onclick="window.location.href='CRUD_Propiedades.php'">
                </div>
               
            </div> 
        </div>
<?php
$sql="SELECT principal,nombre,titulo,precio,propiedades.idprop FROM fotografias INNER JOIN propiedades ON propiedades.idprop = fotografias.idprop WHERE fotografias.principal = 1";
$result=mysqli_query(conectar(),$sql);
while($datos=mysqli_fetch_array($result))
{
?>
<div id="propiedades">
    <div class="claseprop">
        <div class="card-header titulofoto alinear"><?php echo strtoupper($datos['titulo']);?> </div>
        <div class="card-body"><img src="propiedades-react/public/propiedades/<?php echo $datos['nombre'];?>" width="270px" height="170px"></div>
        <div class="card-footer precio alinear">
            $<?php echo number_format($datos['precio'], 0, '', '.');?><br><a href="mostrardetalle.php?id=<?php echo $datos['idprop'];?>">Ver Más</a>
        </div>
    </div>
</div>
<?php
}
?>
</body>
</html>
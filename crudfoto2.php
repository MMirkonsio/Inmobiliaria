<?php

include("functions/setup.php");

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Editar Fotos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link href="css/miestilo.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<div  class="background">
<?php
$sql="SELECT * FROM fotografias where idprop=".$_GET['idprop'];
$result=mysqli_query(conectar(),$sql);
while($datos=mysqli_fetch_array($result))
{
?>
<div id="crudfoto">
    <div class="card">
        <div class="card-body"><img src="img/propiedades/<?php echo $datos['nombre'];?>" width="270px"></div>
        <div class="card-footer precio alinear">
        <?php
         if($datos['principal']==1){
            ?>
            <img src="img/principal.png">
        <?php
         }else{
            ?>
            <a style="filter: invert(100%);" href="editarfotos.php?idprop=<?php echo $_GET['idprop'];?>&idfoto=<?php echo $datos['idfoto'];?>&op=1"><img src="img/noprincipal.png"></a>
         <?php
         }

        if(!$datos['principal']==1)
        { 
         if($datos['estado']==1){
        ?>           
            <a href="editarfotos.php?idprop=<?php echo $_GET['idprop'];?>&idfoto=<?php echo $datos['idfoto'];?>&op=2"><img src="img/activo.png"></a>
            <?php
         }else{
            ?>
            <a href="editarfotos.php?idprop=<?php echo $_GET['idprop'];?>&idfoto=<?php echo $datos['idfoto'];?>&op=3"><img src="img/inactivo.png"></a>
            <?php
         }
        }
        if(!$datos['principal']==1)
        { 
         ?> 
            
            <a href="editarfotos.php?idprop=<?php echo $_GET['idprop'];?>&idfoto=<?php echo $datos['idfoto'];?>&op=4"><img src="img/eliminar.png"></a>
        <?php
        }
        ?>
        </div>
    </div>
</div>


</body>
</html>
<?php
}
?>
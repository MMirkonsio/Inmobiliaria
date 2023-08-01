<?php

include("functions/setup.php");

?>
<!DOCTYPE html>
<html>
<head>
<title>Seleccion Multiple Dinamica</title>
<meta charset="UTF-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link href="css/miestilo.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>

<div id="filtro">
    <div class="card">
    <div class="card-header">FILTRO DE BUSQUEDA DE PROPIEDADES</div>
    <div class="card-body">
    <label for="cars">Seleccione Región de :</label>
                <select id="region" name="region">
                <option value="0">Seleccione</option>
                <?php
                    $sql="select * from regiones where estado=1";
                    $result=mysqli_query(conectar(),$sql);
                    while($datos=mysqli_fetch_array($result))
                    {
                        ?>
                            <option value="<?php echo $datos['idregion'];?>"><?php echo $datos['nombre'];?></option>
                    <?php
                    }
                    ?>
                </select>

                <label for="cars">Provincia:</label>
                <select id="provincia" name="provincia">
                </select>

                <label for="cars">Comuna:</label>
                <select id="comuna" name="comuna">
                </select>

                <label for="cars">Sector:</label>
                <select id="sector" name="sector">
                </select>
    </div>
    </div>
</div>
<hr>
<div id="mprop">
    <?php
    $sql="SELECT principal,nombre,titulo,precio,propiedades.idprop FROM fotografias INNER JOIN propiedades ON propiedades.idprop = fotografias.idprop WHERE fotografias.principal = 1";
    $result=mysqli_query(conectar(),$sql);
    while($datos=mysqli_fetch_array($result))
    {
    ?>
    <div id="prop">
        <div class="card">
            <div class="card-header titulofoto alinear"><?php echo strtoupper($datos['titulo']);?></div>
            <div class="card-body"><img src="img/propiedades/<?php echo $datos['nombre'];?>" width="270px" height="170px"></div>
            <div class="card-footer precio alinear">
                $<?php echo number_format($datos['precio'], 0, '', '.');?><br><a href="mostrardetalle.php?id=<?php echo $datos['idprop'];?>">Ver Más</a>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="js/principal.js"></script>

</body>
</html>

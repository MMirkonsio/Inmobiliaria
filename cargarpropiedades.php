<?php

include("functions/setup.php");

$sql="SELECT principal,nombre,titulo,precio,propiedades.idprop,propiedades.idsector FROM fotografias INNER JOIN propiedades ON propiedades.idprop = fotografias.idprop WHERE fotografias.principal = 1 and propiedades.idsector=".$_POST['idsector'];
$result=mysqli_query(conectar(),$sql);
$cont=mysqli_num_rows($result);
if($cont!=0)
{

    while($datos=mysqli_fetch_array($result))
    {
    ?>
    <div id="prop">
        <div class="card">
            <div class="card-header titulofoto alinear"><?php echo strtoupper($datos['titulo']);?> </div>
            <div class="card-body"><img src="img/propiedades/<?php echo $datos['nombre'];?>" width="270px" height="150px"></div>
            <div class="card-footer precio alinear">
                $<?php echo number_format($datos['precio'], 0, '', '.');?><br><a href="mostrardetalle.php?id=<?php echo $datos['idprop'];?>">Ver Más</a>
            </div>
        </div>
    </div>
    <?php
    }
}else
{?>
    <div>
        <div class="Noencuentra">
            <div class="card-header titulofoto alinear">CRITERIO DE BUSQUEDA</div>
            <div class="card-body alinear"><b>No hay Propiedades con el criterio de búsqueda Seleccionado</b></div>
        </div>
    </div>
<?php
}
?>
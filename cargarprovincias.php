<?php

include("functions/setup.php");

?>

<option value="0">Seleccione</option>
<?php
    $sql="select * from provincias where estado=1 and idregion=".$_POST['idregion'];
    $result=mysqli_query(conectar(),$sql);
    while($datos=mysqli_fetch_array($result))
    {
        ?>
            <option value="<?php echo $datos['idprovincia'];?>"><?php echo $datos['nombre'];?></option>
    <?php
    }
    ?>
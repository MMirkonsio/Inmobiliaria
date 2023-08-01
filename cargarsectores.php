<?php

include("functions/setup.php");

?>

<option value="0">Seleccione</option>
<?php
    $sql="select * from sectores where estado=1 and idcomuna=".$_POST['idcomuna'];
    $result=mysqli_query(conectar(),$sql);
    while($datos=mysqli_fetch_array($result))
    {
        ?>
            <option value="<?php echo $datos['idsector'];?>"><?php echo $datos['nombre'];?></option>
    <?php
    }
    ?>
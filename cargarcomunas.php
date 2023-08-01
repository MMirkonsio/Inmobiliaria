<?php

include("functions/setup.php");

?>

<option value="0">Seleccione</option>
<?php
    $sql="select * from comunas where estado=1 and idprovincia=".$_POST['idprovincia'];
    $result=mysqli_query(conectar(),$sql);
    while($datos=mysqli_fetch_array($result))
    {
        ?>
            <option value="<?php echo $datos['idcomuna'];?>"><?php echo $datos['nombre'];?></option>
    <?php
    }
    ?>
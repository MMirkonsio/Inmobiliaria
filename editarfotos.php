<?php

include("functions/setup.php");

switch ($_GET['op']){
    case 1: principal();
        break;
    case 2:desactivar();
        break;
    case 3:activar();
        break;
    case 4:eliminar();
        break;
}

function principal()
{
    $sql="UPDATE fotografias SET principal=0 WHERE idprop=".$_GET['idprop'];
    mysqli_query(conectar(),$sql);

    $sql="UPDATE fotografias SET principal=1 WHERE idfoto=".$_GET['idfoto'];
    mysqli_query(conectar(),$sql);

    $sql="UPDATE fotografias SET estado=1 WHERE idfoto=".$_GET['idfoto'];
    mysqli_query(conectar(),$sql);
    
    header("Location:crudfoto2.php?idprop=".$_GET['idprop']);
}

function desactivar(){
    $sql="UPDATE fotografias SET estado=0 WHERE idfoto=".$_GET['idfoto'];
    mysqli_query(conectar(),$sql);

    header("Location:crudfoto2.php?idprop=".$_GET['idprop']);
}

function activar(){
    $sql="UPDATE fotografias SET estado=1 WHERE idfoto=".$_GET['idfoto'];
    mysqli_query(conectar(),$sql);

    header("Location:crudfoto2.php?idprop=".$_GET['idprop']);
}

function eliminar()
{
    $sql="DELETE FROM fotografias WHERE idfoto=".$_GET['idfoto'];
    mysqli_query(conectar(),$sql);

    header("Location:crudfoto2.php?idprop=".$_GET['idprop']);
}
?>
<?php

include("functions/setup.php");

if(isset($_GET['idusu']))
{
    $sql="DELETE FROM usuarios WHERE id_usu =".$_GET['idusu'];
    mysqli_query(conectar(),$sql);
    header("Location:formulariousuario.php");
}

switch($_POST['btn']){
    case "Ingresar": ingresar();
        break;
    case "Modificar": modificar();
        break;
    case "Eliminar": eliminar();
        break;
    case "Cancelar": cancelar();
        break;
}

function ingresar()
{
    $clavecifrada=md5($_POST['clave2']);
    $usu=contarusu()+1;
    $nombrefoto=fecha_hora()."-".$usu.".png";

    if($_FILES["foto"]["name"]=="")
    {
        $sql="INSERT INTO usuarios SET id_usu=".$usu.",nombres='".$_POST['nombres']."',apellidos='".$_POST['apellidos']."',email='".$_POST['email']."',clave='".$clavecifrada."',estado=".$_POST['estado'].",rut='".$_POST['rut']."'";
    }else{
        $sql="INSERT INTO usuarios SET id_usu=".$usu.",nombres='".$_POST['nombres']."',apellidos='".$_POST['apellidos']."',email='".$_POST['email']."',clave='".$clavecifrada."',estado=".$_POST['estado'].",rut='".$_POST['rut']."', fotografia='".$nombrefoto."'";
        mkdir('img/'.$usu, 0777, true);
        move_uploaded_file($_FILES["foto"]["tmp_name"], "img/".$usu."/".$nombrefoto);
    }
    mysqli_query(conectar(),$sql);
    header("Location:formulariousuario.php");
}

function modificar()
{
    if($_FILES["foto"]["name"]=="")
    {
        $sql="UPDATE usuarios SET nombres = '".$_POST['nombres']."', apellidos = '".$_POST['apellidos']."', email = '".$_POST['email']."', estado =".$_POST['estado'].", rut = '".$_POST['rut']."' WHERE id_usu =".$_POST['id_usu'];
        mysqli_query(conectar(),$sql);
    }else{
        $usu=$_POST['id_usu'];
        $nombrefoto=fecha_hora()."-".$usu.".png";
        $sql="UPDATE usuarios SET nombres = '".$_POST['nombres']."', apellidos = '".$_POST['apellidos']."', email = '".$_POST['email']."', estado =".$_POST['estado'].", rut = '".$_POST['rut']."',fotografia='".$nombrefoto."' WHERE id_usu =".$_POST['id_usu'];
        
        move_uploaded_file($_FILES["foto"]["tmp_name"], "img/".$usu."/".$nombrefoto);
        mysqli_query(conectar(),$sql);
    }
    
    header("Location:formulariousuario.php");
}

function eliminar()
{
    $sql="DELETE FROM usuarios WHERE id_usu =".$_POST['id_usu'];
    mysqli_query(conectar(),$sql);
    header("Location:formulariousuario.php");
}

function cancelar()
{
    header("Location:formulariousuario.php");
}
?>
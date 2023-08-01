<?php
include("functions/setup.php");

if (isset($_POST['tipo'])) {
    if ($_POST['tipo'] == 1) {
        $sql = "SELECT * FROM usuarios WHERE email='" . $_POST['usu'] . "'";
        $result = mysqli_query(conectar(), $sql);
        $datos = mysqli_fetch_array($result);
        $cont = mysqli_num_rows($result);

        echo $cont;
    } else {
        $sql = "SELECT * FROM usuarios WHERE email='" . $_POST['usu'] . "' AND clave='" . md5($_POST['pass']) . "' AND estado=1";
        $result = mysqli_query(conectar(), $sql);
        $datos = mysqli_fetch_array($result);
        $cont = mysqli_num_rows($result);

        echo $cont;
    }
} else {
    $sql = "SELECT * FROM usuarios WHERE email='" . $_POST['email'] . "' AND clave='" . md5($_POST['pwd']) . "' AND estado=1";
    $result = mysqli_query(conectar(), $sql);
    $datos = mysqli_fetch_array($result);
    $cont = mysqli_num_rows($result);

    if ($cont == 0) {
        header("Location:index.php");
    } else {
        session_start();
        $_SESSION['usuario'] = $datos['nombres'] . " " . $datos['apellidos'];
        header("Location:dashboard.php");
    }
}




?>

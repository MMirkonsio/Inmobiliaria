<?php

include("functions/setup.php");

if(isset($_GET['idusu']))
{
  $sql="select * from usuarios where id_usu=".$_GET['idusu'];
  $result=mysqli_query(conectar(),$sql);
  $datos=mysqli_fetch_array($result);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Formulario Usuarios</title>
<meta charset="UTF-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link href="css/miestilo.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
<div  
class="background" >

<div id="imagen_logo"><img src="imagenes/LOGO2.png" style="height: 130px;width: 400px;position: absolute; top: 0; left: 0; z-index: 1;"></div>

<div id="formulario">
  <form name="form1" method="post" action="procesausu.php" enctype="multipart/form-data">
    <div class="contenedor_form">
        <div class="text_usua3">Antecedentes de Usuario</div>
        <div class="card-body">
          <div class="container">
            <div class="row">
              <div class="col-sm-2">
              <?php

                if(!isset($_GET['idusu']))
                {
                    ?>
                    <img src="img/comodin.jpg" width="200px" height="200px" style="position: relative; top: 30px; left: 0;">
                <?php
                }else
                {
                ?>
                    <img src="img/<?php echo $datos['id_usu']?>/<?php echo $datos['fotografia']?>" width="150px">
                <?php
                }
                ?>
              </div>
              <div class="col-sm-10">
              <div class="row">
              <div class="col-sm-4">
                <label for="rut" class="form-label">Rut:</label>
                <input type="text" class="form-control" id="rut" name="rut" required value="<?php if(isset($_GET['idusu'])){echo $datos['rut'];}?>">
              </div>
              <div class="col-sm-4">
                <label for="nombres" class="form-label">Nombres:</label>
                <input type="text" class="form-control" id="nombres" name="nombres" required value="<?php if(isset($_GET['idusu'])){echo $datos['nombres'];}?>">
              </div>
              <div class="col-sm-4">
                <label for="apellidos" class="form-label">Apellidos:</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" required value="<?php if(isset($_GET['idusu'])){echo $datos['apellidos'];}?>">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <label for="email" class="form-label">email:</label>
                <input type="email" class="form-control" id="email" name="email" required value="<?php if(isset($_GET['idusu'])){echo $datos['email'];}?>">
              </div>
              <div class="col-sm-4">
              <?php
              if(!isset($_GET['idusu']))
              {?>
                <label for="clave" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" id="clave" name="clave" required>
              <?php
              }
              ?>
              </div>
              <div class="col-sm-4">
              <?php
              if(!isset($_GET['idusu']))
              {?>
                <label for="clave2" class="form-label">Rep. Contraseña:</label>
                <input type="password" class="form-control" id="clave2" name="clave2" required>
                <?php
              }
              ?>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <label for="estado1" class="form-label">Estado:</label>
                <select id="estado" name="estado" class="form-control" required>
                  <option value="3" selected>Seleccionar</option>
                  <option value="1" <?php if(isset($_GET['idusu'])){ if($datos['estado']==1){?> selected <?php }} ?>>Activo</option>
                  <option value="2" <?php if(isset($_GET['idusu'])){ if($datos['estado']==2){?> selected <?php }} ?>>Inactivo</option>
                </select>
              </div>
              <div class="col-sm-6">
                <label for="fotografia" class="form-label">Subir Fotografia:</label>
                <input type="file" class="form-control" id="foto" name="foto">
              </div>
            </div>
              </div>
            </div>

            
            <div class="row">
              <div class="col-sm-12">
                <hr>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 alinear">
            <?php
            if(!isset($_GET['idusu']))
            {
              ?>
                <button type="button" id="btningresar" class="btn btn-primary " onclick="validar(this.value);" value="Ingresar">Ingresar</button>
            <?php
            }else{
              ?>
                <button type="button" id="btnmodificar" class="btn btn-success " onclick="validar(this.value);" value="Modificar">Modificar</button>
                <button type="button" id="btneliminar" class="btn btn-danger " onclick="validar(this.value);" value="Eliminar">Eliminar</button>
            <?php
            }
            ?>
                <button type="reset" id="btncancelar" class="btn btn-secondary " onclick="window.location.href='dashboard.php'">Cancelar</button>
                <input type="hidden" name="btn">
                <input type="hidden" name="id_usu" value="<?php if(isset($_GET['idusu'])){echo $_GET['idusu'];}?>">
              </div>
            </div>  
          </div>
        </div>
      </div>
    </form>
</div>
<br>

<div id="buscartxt">
  <div class="row">
      <div class="col-sm-12">
          <label for="buscar">Buscar:</label>
          <input type="text" id="buscar" name="buscar">
      </div>
  </div>
</div>
<div id="grilla">
    
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="js/jquery.Rut.js"></script>
<script src="js/ctrlusuario.js"></script>

<script>
  function validar(valor)
  {
    if(valor=="Ingresar")
    {
      if(document.form1.rut.value=="")
      {
        alert("debe ingresar rut");
        return false;
      }

      if(document.form1.nombres.value=="")
      {
        alert("debe ingresar el nombre");
        document.form1.nombres.focus();
        return false;
      }

      if(document.form1.apellidos.value=="")
      {
        document.form1.apellidos.focus();
        alert("debe ingresar los apellidos");
        return false;
      }
      if(document.form1.email.value=="")
      {
        document.form1.email.focus();
        alert("debe ingresar el email");
        return false;
      }else{
        if(!validar_email(document.form1.email.value))
        {
            alert("El email NO es correcto");
            document.form1.email.focus();
            return false;
        }
      }

      if(document.form1.clave.value=="")
      {
        document.form1.clave.focus();
        alert("debe ingresar la clave");
        return false;
      }

      if(document.form1.clave2.value=="")
      {
        document.form1.clave2.focus();
        alert("debe repetir la clave");
        return false;
      }

      if(document.form1.clave.value!=document.form1.clave2.value)
      {
        alert("las claves deben ser iguales");
        document.form1.clave.value="";
        document.form1.clave2.value="";
        document.form1.clave.focus();
        return false;
      }

      if(document.form1.estado.value==3)
      {
        document.form1.estado.focus();
        alert("debe selecionar el estado");
        return false;
      }
    }
      document.form1.btn.value=valor;
      document.form1.submit();
  }

  function validar_email( email ) 
  {
            var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email) ? true : false;
  }

</script>

</body>
</html>
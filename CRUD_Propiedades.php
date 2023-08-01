<?php



include("functions/setup.php");

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Crud Propiedades Sistema PENKA LTDA</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link href="css/miestilo.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<div  class="background" ></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<body>
    <div id="imagen_logo"><img src="imagenes/LOGO2.png" style="position: absolute; top: 0; left: 0;"></div>
      <div id="contenedor_form_prop">
         <div id="text_usua">Mantenedor de Propiedades</div>
         <br>
              <form name="form1" action="CRUD_Propiedades2.php" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-4">
              <label for="titulo" class="form-label">Titulo Publicación:</label>
              <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="col-sm-4">
              <label for="nombre" class="form-label">Fotografías (1 a 10):</label>
              <input type="file" class="form-control" id="nombre" name="nombre[]" multiple required max=10>
            </div>
            <div class="col-sm-4">
              <label for="descripcion" class="form-label">Descripción:</label>
              <input type="text" class="form-control" name="descripcion" required>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-4">
              <label for="bano" class="form-label">Cantidad de Baños:</label>
              <input type="number" class="form-control" id="bano" name="bano" min="1" required>
            </div>
            <div class="col-sm-4">
              <label for="mts" class="form-label">Área Total del Terreno (m2):</label>
              <input type="number" class="form-control" id="mts" name="mts" min="1" required>
            </div>
            <div class="col-sm-4">
              <label for="precio" class="form-label">Precio:</label>
              <input type="text" class="form-control" id="precio" name="precio" required>
            </div>
          </div>
          <br>
          <div class="row">
                <div id="Estacionamiento" class="col-sm-4">
                    <label for="estacionamiento" class="form-label">Estacionamiento:</label>
                    <select class="form-control" id="estacionamiento" name="estacionamiento" required>
                        <option value="0">No</option>
                        <option value="1">Sí</option>
                    </select>
                </div>
                <div id="Piscina" class="col-sm-4">
                    <label for="piscina" class="form-label">Piscina:</label>
                    <select class="form-control" id="piscina" name="piscina" required>
                        <option value="0">No</option>
                        <option value="1">Sí</option>
                    </select>
                </div>
          </div>

          <br>
          <br>
          <div id="row">
            <div id="filtro_prop"  class="form-label">
              <h4 class="card-header">Ubicación de Propiedad</h4>
              <br>

           

              <label for="region">Región:</label>
              <select id="region" name="idregion">
                <option value="0">Seleccione</option>
                <?php
                $sql = "SELECT * FROM regiones WHERE estado = 1";
                $result = mysqli_query(conectar(), $sql);
                while ($datos = mysqli_fetch_array($result)) {
                  ?>
                  <option value="<?php echo $datos['idregion']; ?>"><?php echo $datos['nombre']; ?></option>
                  <?php
                }
                ?>
              </select>

              <label for="provincia">Provincia:</label>
              <select id="provincia" name="idprovincia">
                <option value="0">Seleccione</option>
                <?php
                $sql = "SELECT * FROM provincias WHERE estado = 1";
                $result = mysqli_query(conectar(), $sql);
                while ($datos = mysqli_fetch_array($result)) {
                  ?>
                  <option value="<?php echo $datos['idprovincia']; ?>"><?php echo $datos['nombre']; ?></option>
                  <?php
                }
                ?>
              </select>

              <label for="comuna">Comuna:</label>
              <select id="comuna" name="idcomuna">
                <option value="0">Seleccione</option>
                <?php
                $sql = "SELECT * FROM comunas WHERE estado = 1";
                $result = mysqli_query(conectar(), $sql);
                while ($datos = mysqli_fetch_array($result)) {
                  ?>
                  <option value="<?php echo $datos['idcomuna']; ?>"><?php echo $datos['nombre']; ?></option>
                  <?php
                }
                ?>
              </select>

              <label for="sector">Sector:</label>
              <select id="sector" name="idsector">
                <option value="0">Seleccione</option>
                <?php
                $sql = "SELECT * FROM sectores WHERE estado = 1";
                $result = mysqli_query(conectar(), $sql);
                while ($datos = mysqli_fetch_array($result)) {
                  ?>
                  <option value="<?php echo $datos['idsector']; ?>"><?php echo $datos['nombre']; ?></option>
                  <?php
                }
                ?>
              </select>

              <script src="js/jquery.min.js"></script>
              <script src="js/index.js"></script>

              <div class="Orden_Botons_prop">
                <button type="button" id="boton_usu4-1" onclick="validar();">Registrar</button>
                <input type="button" id="boton_usu5-1" value="Mostrar" onclick="window.location.href='propiedades.php'">
                <input type="button" id="boton_usu2-1" value="Cancelar" onclick="window.location.href='dashboard.php'">
              </div>
            </div>
          </div>
        </form>
        </div>
       </div>
          

<script>
  function validar() {
    if (document.form1.titulo.value == "") {
      document.form1.titulo.focus();
      alert("Debes ingresar el Título de la Publicación");
      return false;
    }

    if (document.form1.nombre.value == "") {
      document.form1.nombre.focus();
      alert("Debes ingresar las Fotos");
      return false;
    }

    if (document.form1.descripcion.value == "") {
      document.form1.descripcion.focus();
      alert("Debes ingresar la Descripción");
      return false;
    }

    var bano = parseInt(document.form1.bano.value);
    if (isNaN(bano) || bano <= 0) {
      document.form1.bano.focus();
      alert("La Cantidad de Baños debe ser un número válido y mayor o igual a 0");
      return false;
    }

    var mts = parseInt(document.form1.mts.value);
    if (isNaN(mts) || mts < 0) {
      document.form1.mts.focus();
      alert("El Área Total del Terreno debe ser un número válido y mayor o igual a 1");
      return false;
    }

    var precio = parseFloat(document.form1.precio.value);
    if (isNaN(precio) || precio < 0) {
      document.form1.precio.focus();
      alert("El precio debe ser un número válido y no puede ser negativo");
      return false;
    }

    if (document.form1.sector.value == "") {
      document.form1.sector.focus();
      alert("Debes ingresar el Sector");
      return false;
    }

    var files = document.getElementById("nombre").files;
    if (files.length > 10) {
      document.getElementById("nombre").value = "";
      document.getElementById("nombre").focus();
      alert("Solo se permite un máximo de 10 archivos");
      return false;
    }

    document.form1.submit();
  }
</script>


</body>
</html>
  
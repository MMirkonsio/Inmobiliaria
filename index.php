<?php

include("functions/setup.php");

?>
<!DOCTYPE html>
<html>
<head>
<title>Proyecto Inmobiliaria</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link href="css/miestilo.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
<div  
class="background" >
</div>
<div id="imagen_logo"><img src="imagenes/LOGO2.png" style="position: relative; top: 0; left: 0;"></div>
<img src="imagenes/315.webp" alt="Publicidad" id="imagen_publi" style="height: 300px; width: 700px;">


<div id="contenedor">
        <div class="cardlogin">
            <div class="card-header" style="font-weight: bold; color: hsl(0, 0%, 100%); font-size: 28px; width: 50%; border-radius: 20px; text-align: center; position: relative; left: 25%;">Autenticación</div>
              <div class="card-body">
                <form action="procesalogin.php" method="post">
                    <div class="mb-3 mt-3">
                      <label for="email" class="form-label">Email:</label><img src="img/ok.PNG" width="20px" id="okusu"><img src="img/pnk.PNG" id="nousu" width="24px">
                      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                    <div class="mb-3">
                      <label for="pwd" class="form-label">Password:</label><img src="img/ok.PNG" width="20px" id="okpass"><img src="img/pnk.PNG" id="nopass" width="24px">
                      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                    </div>
                    <button type="submit" class="btn btn-primary" id="btn" >Submit</button>
                    
                  </form>
            </div>
          </div>
</div>



<ul class="regis_prop">
  <li onclick="window.location.href='dash_prop.html'">Registrar Propietario</li>
  <li onclick="window.location.href='dash_freelance.html'">Registrar Gestor Inmobiliario</li>
  <li>Contacto</li>
</ul>

<script src="js/mijs.js"></script>



<div id="filtro">
    <div class="titulo_busqueda">FILTRO DE BUSQUEDA DE PROPIEDADES
    <p class="filtrobusqueda"></p>
    <script src="js/principal.js"></script>
              <label for="region">Región:</label>
              <select id="region" name="region">
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
              <select id="provincia" name="provincia">
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
              <select id="comuna" name="comuna">
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
              <select id="sector" name="sector">
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
            <div class="card-header titulofoto alinear" ><?php echo strtoupper($datos['titulo']);?></div>
            <div class="card-body"><img src="propiedades-react/public/propiedades/<?php echo $datos['nombre'];?>" width="270px" height="170px"></div>
            <div class="card-footer precio alinear">
                $<?php echo number_format($datos['precio'], 0, '', '.');?><br><a href="mostrardetalle.php?id=<?php echo $datos['idprop'];?>">Ver Más</a>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>
          
<div class="footer-basic">
  <footer>
      <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#">
        <i class="icon ion-social-linkedin"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a>
        <a href="#"><i class="icon ion-social-facebook"></i></a></div>
      <p class="copyright">Derechos reservados a PNK Inmobiliaria © 2023</p>
  </footer>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>


</body>
</html>
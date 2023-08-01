<?php
session_start();


include("functions/setup.php");

$sql="select * from propiedades where idprop=".$_GET['id'];
$result=mysqli_query(conectar(),$sql);
$datos=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
<title>Propiedades</title>
<meta charset="UTF-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link href="css/miestilo.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<div  class="background">
<body>
<div id="mprop">
    <div class="container">
        <div class="card">
            <div class="card-header">
             <?php echo strtoupper($datos['titulo']);?>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                   
                        <div id="demo" class="carousel slide" data-bs-ride="carousel">

                
                        <div class="carousel-indicators">
                        <?php
                          $sqlfoto="select * from fotografias where idprop=".$_GET['id'];
                          $resultfoto=mysqli_query(conectar(),$sqlfoto);
                          $cont=0;
                          while($datosfoto=mysqli_fetch_array($resultfoto))
                          {
                            ?>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="<?php echo $cont;?>" <?php if($datosfoto['principal']==1){?>class="active"<?php } ?>></button>
                        <?php
                            $cont++;
                          }
                          ?>
                        </div>

                    
                        <div class="carousel-inner">
                        <?php
                          $sqlfoto="select * from fotografias where idprop=".$_GET['id'];
                          $resultfoto=mysqli_query(conectar(),$sqlfoto);
                          while($datosfoto=mysqli_fetch_array($resultfoto))
                          {
                            ?>
                            <div class="carousel-item <?php if($datosfoto['principal']==1){?>active<?php }?>">
                                <img src="propiedades-react/public/propiedades/<?php echo $datosfoto['nombre']?>" alt="" class="d-block w-100">
                            </div>
                        <?php
                          }
                        ?>
                        </div>

              
                        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        </button>
                        </div>
                    </div>
                        <div class="col-sm-7">
                            <div class="row">
                                <div class="col-sm-12"><?php echo $datos['descripcion'];?></div>
                                <div class="col-sm-12 alinear precio">$<?php echo number_format($datos['precio'], 0, '', '.');?></div>
                                <div class="col-sm-12"><hr></div>
                                <div class="col-sm-12 alinear iconos"><img src="img/metro.png" width="32px" style="filter: invert(100%);" alt="Area">&nbsp;<?php echo $datos['mts'];?>&nbsp; &nbsp; <img src="img/bano.png" width="32px" style="filter: invert(100%);" alt="Baño">&nbsp;<?php echo $datos['bano'];?>&nbsp; &nbsp; <img src="img/piscina.png" width="32px" style="filter: invert(100%);" alt="Piscina">&nbsp;<?php echo $datos['piscina'];?>&nbsp; &nbsp; <img src="img/esta.png" width="32px" style="filter: invert(100%);" alt="Estacionamiento">&nbsp;<?php echo $datos['estacionamiento'];?></div>
                            </div>
                    
                    </div>
                    <?php
                    if (isset($_SESSION['usuario'])) {
                     
                    ?>
                    <a type="button" id="botoneditfoto" href="crudfoto2.php?idprop=<?php echo $datos['idprop']; ?>">Elegir Foto Principal</a>
                    <?php
                    } else {
                        // El usuario no ha iniciado sesión, no mostrar el botón
                    }
                    ?>

                    <?php
                    if (isset($_SESSION['usuario'])) {
                     
                    ?>
                    <a type="button" id="volverdetalle" href="propiedades.php">Volver</a>
                    <?php
                    } else {
                        // El usuario no ha iniciado sesión, no mostrar el botón
                    }
                    ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

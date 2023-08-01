<?php

include("functions/setup.php");

if(!isset($_POST['texto']))
{
    $sql="select * from usuarios";
}else{
    $sql="SELECT * FROM usuarios WHERE nombres LIKE '%".$_POST['texto']."%' or apellidos LIKE '%".$_POST['texto']."%' or rut LIKE '%".$_POST['texto']."%' or id_usu LIKE '%".$_POST['texto']."%'";
}

?>

<div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6">
                    Listado de Usuario <b>(<?php echo contarusu($sql);?>&nbsp;Usuarios)</b>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover" style="
    color: #fff;">
                <thead>
                  <tr>
                    <th>N°</th>
                    <th>RUt</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th style="text-align: center;">estado</th>
                    <th>Fotografia</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                    <?php

                        
                        $result=mysqli_query(conectar(),$sql);
                        $con=1;
                        while($datos=mysqli_fetch_array($result))
                        {
                    ?>
                        <tr>
                            <td><?php echo $datos['id_usu'];?></td>
                            <td><?php echo $datos['rut'];?></td>
                            <td><?php echo $datos['nombres'];?></td>
                            <td><?php echo $datos['apellidos'];?></td>
                            <td><?php echo $datos['email'];?></td>
                            <td style="text-align: center;"><?php
                                if($datos['estado']=='1')
                                {
                                    ?>
                                    <img src="img/ok.PNG" width="30px"></td>
                                
                                <?php
                                }else{
                                    ?>
                                    <img src="img/pnk.PNG" width="30px"></td>
                                <?php
                                }
                            ?></td>
                            <td>
                            <?php

                            if($datos['fotografia']=="")
                            {
                                ?>
                                <img src="img/comodin.jpg" width="30px">
                            <?php
                            }else
                            {
                            ?>
                                <img src="img/<?php echo $datos['id_usu']?>/<?php echo $datos['fotografia']?>" width="30px">
                            <?php
                            }
                        ?>
                            </td>
                            <td><a href="formulariousuario.php?idusu=<?php echo $datos['id_usu']?>"><img src="img/actualizar"></a> | <a href="procesausu.php?idusu=<?php echo $datos['id_usu']?>"><img src="img/borrar"></a></td>
                        </tr>
                  <?php
                            $con++;
                        }
                    ?>
                </tbody>
              </table>
        </div>
        <div class="card-footer"><a href="exportarexcelusu.php"><img src="img/excel.png">Exportar a Excel</a></div>
      </div>
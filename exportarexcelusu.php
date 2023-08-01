<?php

include("functions/setup.php");

$filename = "usuarios.xls";
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=".$filename);
?>

<table>
  <tr>
    <th>id</th>
    <th>rut</th>
    <th>nombres</th>
    <th>apellidos</th>
    <th>email</th>
    <th>estado</th>
  </tr>
  <?php
    $sql="select * from usuarios";
    $result=mysqli_query(conectar(),$sql);
    while($datos=mysqli_fetch_array($result))
    {
?>
  <tr>
    <td><?php echo $datos['id_usu'];?></td>
    <td><?php echo $datos['rut'];?></td>
    <td><?php echo $datos['nombres'];?></td>
    <td><?php echo $datos['apellidos'];?></td>
    <td><?php echo $datos['email'];?></td>
    <td><?php echo $datos['estado'];?></td>
  </tr>
<?php
    }
?>
</table>
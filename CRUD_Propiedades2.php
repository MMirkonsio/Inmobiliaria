<?php
// Función para establecer la conexión con la base de datos
function conectar() {
    $servername = "localhost"; 
    $username = "root";
    $password = "";
    $dbname = "proyecto"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    return $conn;
}

// Verificar si se ha enviado una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['titulo']) && isset($_POST['descripcion']) && isset($_POST['bano']) && isset($_POST['precio']) && isset($_POST['estacionamiento']) && isset($_POST['piscina']) 
        && isset($_POST['idregion']) && isset($_FILES['nombre']) && isset($_POST['idprovincia']) && isset($_POST['idcomuna']) && isset($_POST['idsector']))
    {
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $bano = $_POST['bano'];
        $mts = $_POST['mts'];
        $precio = $_POST['precio'];
        $estacionamiento = isset($_POST['estacionamiento']) ? 1 : 0;
        $piscina = isset($_POST['piscina']) ? 1 : 0;
        $idregion = $_POST['idregion'];
        $idprovincia = $_POST['idprovincia'];
        $idcomuna = $_POST['idcomuna'];
        $idsector = $_POST['idsector'];

        $conn = conectar();

        $sql = "INSERT INTO propiedades (titulo, descripcion, bano, mts, precio, estacionamiento, piscina, idregion, idprovincia, idcomuna, idsector)
                VALUES ('$titulo', '$descripcion', '$bano', '$mts', '$precio', '$estacionamiento', '$piscina', '$idregion', '$idprovincia', '$idcomuna', '$idsector')";

        if ($conn->query($sql) === TRUE) {
            $idprop = $conn->insert_id;

            if (isset($_FILES['nombre'])) {
                $fotos = $_FILES['nombre'];
                $num_fotos = count($fotos['name']);
                $principal = 1; // Variable para controlar la imagen principal

                for ($i = 0; $i < $num_fotos; $i++) {
                    $nombre_foto = $fotos['name'][$i];
                    $ruta_temporal = $fotos['tmp_name'][$i];
                    $ruta_destino = 'propiedades-react/public/propiedades/' . $nombre_foto;

                    move_uploaded_file($ruta_temporal, $ruta_destino);

                    $sql = "INSERT INTO fotografias (idprop, nombre, principal, estado)
                            VALUES ('$idprop', '$nombre_foto', $principal, 1)";
                    $conn->query($sql);

                    $principal = 0; // La imagen siguiente no será principal
                }
            }

            echo '<script>alert("Registro insertado correctamente");window.location="CRUD_Propiedades.php"</script>';
        } else {
            echo '<script>alert("Error al insertar registro: ' . $conn->error . '");window.location="CRUD_Propiedades.php"</script>';
        }

        $conn->close();
    }
}



?>

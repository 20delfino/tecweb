<?php
// Conexión a la base de datos
@$link = new mysqli('localhost', 'root', '12345678a', 'marketzone');	

/** comprobar la conexión */
if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
}

// Recibe los datos del formulario
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$detalles = $_POST['detalles'];
$unidades = $_POST['unidades'];


$imagenPorDefecto = 'img/imagen.png';

if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
    // Verificar si el archivo es una imagen
    $tipoArchivo = $_FILES['imagen']['type'];
    $permitidos = array('image/jpeg', 'image/png', 'image/gif');

    if (in_array($tipoArchivo, $permitidos)) {
        // Mover la imagen a la carpeta de destino
        $rutaDestino = 'img/' . basename($_FILES['imagen']['name']);
        move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino);
    } else {
        // Si el tipo de archivo no es válido, usar la imagen por defecto
        $rutaDestino = $imagenPorDefecto;
    }
} else {
    // Si no se ha subido ninguna imagen, usar la imagen por defecto
    $rutaDestino = $imagenPorDefecto;
}

// Verificar si los campos obligatorios están completos
if (empty($nombre) || empty($marca) || empty($modelo) || empty($precio) || empty($unidades)) {
    echo "Por favor, completa todos los campos obligatorios (Nombre, Marca, Modelo, Precio, Unidades).";
    exit;
}

// Verificar si el producto ya existe en la base de datos
$query = "SELECT * FROM productos WHERE nombre='$nombre' AND marca='$marca' AND modelo='$modelo'";
$resultado = $link->query($query);

if ($resultado->num_rows > 0) {
    echo "El producto ya existe en la base de datos.";
} else {
    // Insertar el nuevo producto en la base de datos, incluyendo la ruta de la imagen
    //$insert = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado) 
    //           VALUES ('$nombre', '$marca', '$modelo', '$precio', '$detalles', '$unidades', '$ruta_final_imagen', 0)";

    //Nuevo query (solo se omite agregar la columna de eliminado):

    $insert = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) 
           VALUES ('$nombre', '$marca', '$modelo', '$precio', '$detalles', '$unidades', '$rutaDestino')";

    if ($link->query($insert) === TRUE) {
        echo "Producto registrado con éxito.<br>";
        echo "Nombre: $nombre<br>Marca: $marca<br>Modelo: $modelo<br>Precio: $precio<br>Detalles: $detalles<br>Unidades: $unidades<br>";
        if ($rutaDestino) {
            echo "Imagen: <img src='$rutaDestino' width='100'><br>";
        }
    } else {
        echo "Error: " . $insert . "<br>" . $link->error;
    }
}

// Cerrar la conexión
$link->close();
?>

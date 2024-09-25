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

// Carpeta donde se almacenarán las imágenes
$directorio_imagenes = "C:/xampp/htdocs/tecweb/practicas/p08/img";

// Verificar si se ha subido una imagen
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    // Obtener detalles del archivo
    $nombre_imagen = $_FILES['imagen']['name'];
    $ruta_temporal = $_FILES['imagen']['tmp_name'];
    $tipo_imagen = $_FILES['imagen']['type'];
    $tamanio_imagen = $_FILES['imagen']['size'];
    
    // Extensiones permitidas
    $extensiones_permitidas = array("jpg", "jpeg", "png", "gif");
    $extension_imagen = pathinfo($nombre_imagen, PATHINFO_EXTENSION);

    // Verificar el tipo de archivo
    if (!in_array($extension_imagen, $extensiones_permitidas)) {
        echo "Error: Sólo se permiten archivos JPG, JPEG, PNG y GIF.";
        exit;
    }

    // Verificar el tamaño del archivo (por ejemplo, máx. 2MB)
    if ($tamanio_imagen > 2 * 1024 * 1024) {
        echo "Error: El archivo es demasiado grande. Máximo 2MB.";
        exit;
    }

    // Ruta final donde se guardará la imagen
    $ruta_final_imagen = $directorio_imagenes . basename($nombre_imagen);

    // Mover la imagen subida a la carpeta final
    if (move_uploaded_file($ruta_temporal, $ruta_final_imagen)) {
        echo "La imagen se ha subido correctamente.<br>";
    } else {
        echo "Error al subir la imagen.";
        exit;
    }
} else {
    echo "No se ha subido ninguna imagen o ha ocurrido un error.";
    $ruta_final_imagen = NULL; // En caso de no haber imagen, puede ser NULL
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
           VALUES ('$nombre', '$marca', '$modelo', '$precio', '$detalles', '$unidades', '$ruta_final_imagen')";

    if ($link->query($insert) === TRUE) {
        echo "Producto registrado con éxito.<br>";
        echo "Nombre: $nombre<br>Marca: $marca<br>Modelo: $modelo<br>Precio: $precio<br>Detalles: $detalles<br>Unidades: $unidades<br>";
        if ($ruta_final_imagen) {
            echo "Imagen: <img src='$ruta_final_imagen' width='100'><br>";
        }
    } else {
        echo "Error: " . $insert . "<br>" . $link->error;
    }
}

// Cerrar la conexión
$link->close();
?>

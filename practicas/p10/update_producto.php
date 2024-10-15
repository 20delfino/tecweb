<?php
// Conexión a la base de datos
$link = mysqli_connect("localhost", "root", "12345678a", "marketzone");

// Verificar conexión
if ($link === false) {
    die("ERROR: No se pudo conectar a la base de datos. " . mysqli_connect_error());
}

// Verificar si se recibieron datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $id = mysqli_real_escape_string($link, $_POST['id']);
    $nombre = mysqli_real_escape_string($link, $_POST['nombre']);
    $marca = mysqli_real_escape_string($link, $_POST['marca']);
    $modelo = mysqli_real_escape_string($link, $_POST['modelo']);
    $precio = floatval($_POST['precio']); // Convertir a número
    $unidades = intval($_POST['unidades']); // Convertir a número
    $detalles = mysqli_real_escape_string($link, $_POST['detalles']);

    // Manejo de la imagen
    $imagen = ''; // Inicializar como vacío
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
        $nombreArchivo = basename($_FILES['imagen']['name']);
        $rutaDestino = 'img/imagen.png' . $nombreArchivo; // Especifica la ruta correcta donde guardar las imágenes
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
            $imagen = mysqli_real_escape_string($link, $rutaDestino); // Asignar la ruta de la imagen a la variable
        } else {
            echo "ERROR: No se pudo mover el archivo de la imagen.";
            exit;
        }
    } else {
        // Imagen por defecto si no se sube ninguna
        $imagen = 'img/imagen.png'; // Especifica la ruta de la imagen por defecto
    }

    // Crear la consulta SQL para actualizar los datos
    $sql = "UPDATE productos SET 
                nombre='$nombre',
                marca='$marca',
                modelo='$modelo',
                precio=$precio,  /* Sin comillas simples para valores numéricos */
                unidades=$unidades, /* Sin comillas simples para valores numéricos */
                detalles='$detalles',
                imagen='$imagen' 
            WHERE id='$id'";

    // Ejecutar la consulta
    if (mysqli_query($link, $sql)) {
        echo "<h1>El producto ha sido actualizado correctamente.</h1>";
    } else {
        echo "ERROR: No se pudo actualizar el producto. " . mysqli_error($link);
    }
} else {
    echo "ERROR: No se recibió una solicitud POST.";
}

// Cerrar la conexión
mysqli_close($link);
?>

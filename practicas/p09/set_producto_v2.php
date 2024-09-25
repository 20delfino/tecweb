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

// Verificar si los campos obligatorios están completos
if (empty($nombre) || empty($marca) || empty($modelo) || empty($precio) || empty($unidades)) {
    echo "Por favor, completa todos los campos obligatorios (Nombre, Marca, Modelo, Precio, Unidades).";
    exit;
}

// Verificar si el producto ya existe en la base de datos
$query = "SELECT * FROM productos WHERE nombre='$nombre' AND marca='$marca' AND modelo='$modelo'";
$resultado = $conexion->query($query);

if ($resultado->num_rows > 0) {
    echo "El producto ya existe en la base de datos.";
} else {
    // Insertar el nuevo producto en la base de datos
    $insert = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, eliminado) 
               VALUES ('$nombre', '$marca', '$modelo', '$precio', '$detalles', '$unidades', 0)";

    if ($conexion->query($insert) === TRUE) {
        echo "Producto registrado con éxito.<br>";
        echo "Nombre: $nombre<br>Marca: $marca<br>Modelo: $modelo<br>Precio: $precio<br>Detalles: $detalles<br>Unidades: $unidades";
    } else {
        echo "Error: " . $insert . "<br>" . $conexion->error;
    }
}

// Cerrar la conexión
$conexion->close();
?>

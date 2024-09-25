<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
    <title>Productos Vigentes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h3>Productos Vigentes</h3>

    <?php
    // Crear la conexión
    @$link = new mysqli('localhost', 'root', '12345678a', 'marketzone');

    // Comprobar la conexión
    if ($link->connect_errno) {
        die('<p>Falló la conexión: ' . $link->connect_error . '</p>');
    }

    // Modificar la consulta para mostrar solo productos no eliminados (eliminado = 0)
    $query = "SELECT * FROM productos WHERE eliminado = 0";

    // Ejecutar la consulta
    if ($result = $link->query($query)) {
        if ($result->num_rows > 0) {
            echo '<table class="table">';
            echo '<thead class="thead-dark">';
            echo '<tr>';
            echo '<th scope="col">#</th>';
            echo '<th scope="col">Nombre</th>';
            echo '<th scope="col">Marca</th>';
            echo '<th scope="col">Modelo</th>';
            echo '<th scope="col">Precio</th>';
            echo '<th scope="col">Unidades</th>';
            echo '<th scope="col">Detalles</th>';
            echo '<th scope="col">Imagen</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            // Mostrar los productos vigentes
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<th scope="row">' . htmlspecialchars($row['id']) . '</th>';
                echo '<td>' . htmlspecialchars($row['nombre']) . '</td>';
                echo '<td>' . htmlspecialchars($row['marca']) . '</td>';
                echo '<td>' . htmlspecialchars($row['modelo']) . '</td>';
                echo '<td>' . htmlspecialchars($row['precio']) . '</td>';
                echo '<td>' . htmlspecialchars($row['unidades']) . '</td>';
                echo '<td>' . utf8_encode($row['detalles']) . '</td>';
                echo '<td><img src="' . htmlspecialchars($row['imagen']) . '" alt="Imagen del producto" width="100" /></td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p>No se encontraron productos vigentes.</p>';
        }

        $result->free();
    } else {
        echo '<p>Error en la consulta.</p>';
    }

    // Cerrar la conexión
    $link->close();
    ?>
</body>
</html>

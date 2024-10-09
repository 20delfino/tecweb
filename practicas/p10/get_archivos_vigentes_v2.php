<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
    <title>Productos Vigentes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script>
        function show(event) {
            // Se obtiene el id de la fila donde está el botón presionado
            var rowId = event.target.parentNode.parentNode.id;

            // Se obtienen los datos de la fila en forma de arreglo
            var data = document.getElementById(rowId).querySelectorAll(".row-data");

            // Se obtienen los datos de cada columna
            var NombreProd = data[0].innerHTML;
            var MarcaProd = data[1].innerHTML;
            var ModeloProd = data[2].innerHTML;
            var PrecioProd = data[3].innerHTML;
            var UnidadesProd = data[4].innerHTML;  // Este es el campo de "Unidades"
            var DetallesProd = data[5].innerHTML;
            var ImgProd = data[6].querySelector('img').src;  // Se obtiene la URL de la imagen

            // Envía los datos a la siguiente función
            send2form(NombreProd, MarcaProd, ModeloProd, PrecioProd, UnidadesProd, DetallesProd, ImgProd);
        }

    function send2form(NombreProd, MarcaProd, ModeloProd, PrecioProd, UnidadesProd, DetallesProd, ImgProd) {
        var urlForm = "http://localhost/tecweb/practicas/p10/formulario_productos_v2.php";

        // Codificar los datos para que sean compatibles con la URL
        var nomForm = "nombre=" + encodeURIComponent(NombreProd);
        var marForm = "marca=" + encodeURIComponent(MarcaProd);
        var modForm = "modelo=" + encodeURIComponent(ModeloProd);
        var preForm = "precio=" + encodeURIComponent(PrecioProd);
        var uniForm = "unidades=" + encodeURIComponent(UnidadesProd);
        var detForm = "detalles=" + encodeURIComponent(DetallesProd);
        var ImForm = "imagen=" + encodeURIComponent(ImgProd);

        // Corregir concatenación de variables para la URL
        window.open(urlForm + "?" + nomForm + "&" + marForm + "&" + modForm + "&" + preForm + "&" + uniForm + "&" + detForm + "&" + ImForm, "_blank");
    }

    </script>
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
            echo '<th scope="col">Accion</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            // Mostrar los productos vigentes
            while ($row = $result->fetch_assoc()) {
                echo '<tr id="row-' . htmlspecialchars($row['id']) . '">';  // Asigna un id único a cada fila
                echo '<th scope="row">' . htmlspecialchars($row['id']) . '</th>';
                echo '<td class="row-data">' . htmlspecialchars($row['nombre']) . '</td>';
                echo '<td class="row-data">' . htmlspecialchars($row['marca']) . '</td>';
                echo '<td class="row-data">' . htmlspecialchars($row['modelo']) . '</td>';
                echo '<td class="row-data">' . htmlspecialchars($row['precio']) . '</td>';
                echo '<td class="row-data">' . htmlspecialchars($row['unidades']) . '</td>';
                echo '<td class="row-data">' . utf8_encode($row['detalles']) . '</td>';
                echo '<td class="row-data"><img src="' . htmlspecialchars($row['imagen']) . '" alt="Imagen del producto" width="100" /></td>';
                echo '<td><input type="button" value="Editar" onclick="show(event)" /></td>'; // Pasa el evento al onclick
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

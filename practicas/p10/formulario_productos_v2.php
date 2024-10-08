<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Registro de productos</title>
    <style type="text/css">
        ol,
        ul {
            list-style-type: none;
        }
    </style>

    <script type="text/javascript">
      function validarFormulario() {
        var nombre = document.forms["formularioProductos"]["nombre"].value;
        if (nombre === "" || nombre.length > 100) {
            alert("El nombre es requerido y debe tener 100 caracteres o menos.");
            return false;
        }

        var marca = document.forms["formularioProductos"]["marca"].value;
        if (marca === "") {
            alert("Debe seleccionar una marca.");
            return false;
        }

        var modelo = document.forms["formularioProductos"]["modelo"].value;
        var modeloRegex = /^[a-zA-Z0-9]+$/;
        if (modelo === "" || !modeloRegex.test(modelo) || modelo.length > 25) {
            alert("El modelo es requerido, debe ser alfanumérico y tener 25 caracteres o menos.");
            return false;
        }

        var precio = document.forms["formularioProductos"]["precio"].value;
        if (precio === "" || precio <= 99.99) {
            alert("El precio es requerido y debe ser mayor a 99.99.");
            return false;
        }

        var detalles = document.forms["formularioProductos"]["detalles"].value;
        if (detalles.length > 250) {
            alert("Los detalles deben tener 250 caracteres o menos.");
            return false;
        }

        var unidades = document.forms["formularioProductos"]["unidades"].value;
        if (unidades === "" || unidades < 0) {
            alert("Las unidades son requeridas y deben ser mayor o igual a 0.");
            return false;
        }

        var imagen = document.forms["formularioProductos"]["imagen"].value;
        if (imagen === "") {
            alert("No se ha cargado una imagen. Se usará la imagen por defecto: 'imagen.png'.");
        }

        return true;
      }
    </script>
</head>

<body>
  <h1>Registro de productos para la tienda de instrumentos</h1>
  <form id="formularioProductos" action="http://localhost/tecweb/practicas/p10/set_producto_v2.php" method="post" enctype="multipart/form-data" onsubmit="return validarFormulario()">
    <h2>Información del producto</h2>
      <fieldset>
        <legend>Rellena todos los datos</legend>
          <ul>
            <li><label for="form-name">Nombre:</label> <input type="text" name="nombre" maxlength="100" required
                                                        value="<?= !empty($_POST['nombre'])?$_POST['nombre']:$_GET['nombre'] ?>"></li>  
              <li><label for="form-marca">Marca:</label>
                <select name="marca" required>
                  <option value="">--Selecciona una marca--</option>
                  <option value="Fender">Fender</option>
                  <option value="Ibanez">Ibanez</option>
                  <option value="Roland">Roland</option>
                  <option value="StratoCastro">StratoCastro</option>
                  <option value="Gibson">Gibson</option>
                </select>
              </li>
              
              <li><label for="form-modelo">Modelo:</label> <input type="text" name="modelo" maxlength="25" pattern="[a-zA-Z0-9]+" required></li>             
              <li><label for="form-precio">Precio:</label> <input type="number" name="precio" min="99.99" required></li>              
              <li><label for="form-detalles">Detalles del producto (opcional):</label><br>
                  <textarea name="detalles" rows="4" cols="60" placeholder="No más de 250 caracteres de longitud" maxlength="250"></textarea>
              </li>
              <li><label for="form-unidades">Unidades:</label> <input type="number" name="unidades" min="0" required></li>
              <li><label for="form-imagen">Imagen del Producto:</label> <input type="file" name="imagen"></li>
          </ul>
      </fieldset>
      <input type="submit" value="Registrar Producto">
      <input type="reset">
  </form>
</body>

</html>

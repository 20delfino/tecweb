<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta</title>
</head>
<body>    
    <?php
    // Respuesta ejercicio 5
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $edad = isset($_POST['edad']) ? intval($_POST['edad']) : 0;
        $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';

        if ($sexo == 'femenino' && $edad >= 18 && $edad <= 35) {
            echo "<h1>Bienvenida, usted está en el rango de edad permitido.</h1>";
        } else {
            echo "<p>Error: Usted no cumple con los criterios de edad y sexo.</p>";
        }
    } else {
        echo "<h1>Por favor, complete el formulario.</h1>";
    }
    ?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concurso</title>
    <style>
        body{
        background-color: #62b368;
        }
        h1{
            color: #ffff;
        }
        h2{
            color: #ffff;
        }
        li{
            font-size: 20px;
        }
    </style>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"]=="POST"){
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $tel = $_POST['telefono'];
            echo "<h1>MUCHAS GRACIAS</h1>";
            echo '<p>Gracias por entrar al concurso de Tenis Mike "Chidos mis Tenis". Hemos recibido la siguiente informacion
                    de tu registro:</p>';
            echo "<h2>Acerca de ti: </h2>";
            echo "<ul>";
            echo "<li>Nombre:". $nombre . "</li>";
            echo "<li>Telefeno:" . $tel . "</li>";
            echo "<li>Correo:" . $email . "</li>";
            echo "</ul>";
            echo "<p>Tu triste historia: </p>";
            echo "<h2>Tu diseño de tenis (si ganas) </h2>";
        }
    ?>
</body>
</html>
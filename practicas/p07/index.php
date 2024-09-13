<?php 
include "src/funciones.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 7</title>
</head>
<body>
    <h1>Para visualizar la solucion de cada ejercicio rellena el campo correspondiente del formulario:</h1>
    <form method="GET">
        <h2>Ejercicio 1 comprobar si un numero es multiplo de 5 y 7.</h2>
        <h3>Ingresa el número a comprobar: <input type="number" name="numero"></h3>
        <p><input type="submit" value="Comprobar"></p>
        <?php
            if (isset($_GET['numero'])) {
                $numero = intval($_GET['numero']);
                if ($numero > 0) {
                    multiplo5y7($numero);
                } else {
                    echo "Por favor ingresa un número mayor a cero para comprobar";
                }
            } else {
                echo "Por favor ingresa un número para comprobar";
            }
        ?>
        <h2>Ejercicio 2: Generar Secuencia Impar, Par, Impar</h2>
        <?php
            $resultado = matriz();
            echo "<p>Se generaron {$resultado['iteraciones']} iteraciones para obtener la siguiente secuencia [impar, par, impar].</p>";
            echo implode(", ", $resultado['fila'][0]);
        ?>

        <h2>Ejercicio 3: Encontrar Múltiplo con Ciclo While</h2>
        <label for="multiplo">Introduce un número para encontrar su múltiplo:</label>
        <input type="number" name="multiplo">
        <button type="submit">Encontrar Múltiplo</button>

        <?php
        if (isset($_GET['multiplo'])) {
            // Validar y convertir el valor a entero
            $multiplo = intval($_GET['multiplo']);
    
            // Asegurarse de que $multiplo no sea cero para evitar errores de división
            if ($multiplo > 0) {
                $resultadoWhile = MultiploWhile($multiplo);
                $resultadoDoWhile = MultiploDoWhile($multiplo);
    
                echo "<p>Con while, el primer múltiplo de $multiplo es: $resultadoWhile</p>";
                echo "<p>Con do-while, el primer múltiplo de $multiplo es: $resultadoDoWhile</p>";
            } else {
                echo "<p>Por favor, introduce un número mayor que cero.</p>";
            }
        }
        ?>
        <h2>Ejercicio 4: Crear Arreglo de Letras de 'a' a 'z'</h2>
        <?php
            $arreglo = ArregloLetras();
            echo "<table border='1'>";
            echo "<tr><th>Índice</th><th>Letra</th></tr>";
            foreach ($arreglo as $indice => $letra) {
                echo "<tr><td>$indice</td><td>$letra</td></tr>";
            }
            echo "</table>";
        ?>

    </form>

</body>
</html>
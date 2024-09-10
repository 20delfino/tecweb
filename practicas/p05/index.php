<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title> Práctica 5 </title>
    </head>
<body>
<?php
        //Ejercicio 1
    echo "<h2> 1. Determina cuál de las siguientes variables son válidas y explica por qué:</h2>";
    echo "<h3> a) \$_myvar b) \$_7var c) myvar d) \$myvar e) \$var7 f) \$_element1 g) \$house*5 </h3>";
    echo "<h3> Respuesta:</h3>
        <p>Las opciones a, b, d, e y f son las variable válidas, a continuacion se explica por qué las
            opciones c y g no lo son:
        </p>
        <ul>
        <li> c) Toda variable en php debe comenzar con el simbolo de $ lo cual no tiene. </li>
        <li> g) A pesar de que la variable empieza por el simbolo $, ésta opcion no es correcta ya que incluye 
            el carácter de *. </li>
        </ul> ";

        //Ejercicio 2
    echo "<h2>2. Proporcionar los valores de \$a, \$b, \$c como sigue y mostrar el contenido de cada variable:</h2>";
    $a = "ManejadorSQL";
    $b = 'MySQL';
    $c = &$a;

    echo "<p>\$a</> <br>";
    echo $a; // ManejadorSQL
    echo "<p>\$b</> <br>";
    echo $b; // MySQL
    echo "<p>\$c</> <br>";
    echo $c; // ManejadorSQL
    echo "<br>";
    echo "<h3> -Proporcionar los valores de \$a, \$b, \$c como sigue:</h3>";
    echo "<p>\$a = 'PHP server'</p>";
    echo "<p>\$b = &\$a</p>";

    echo "<h3> -Mostrar los nuevos valores: </h3>";
    echo "<p>\$a</> <br>";
    echo $a; // PHP server
    echo "<p>\$b</> <br>";
    echo $b; // PHP server
    echo "<p>\$c</> <br>";
    echo $c; // PHP server
    echo "<h3> -Describiendo lo observado</h3>";
    echo "<p> Las variables \$b y \$c están relacionadas con \$a por referencia,
                de este modo y como se puede observar cualquier cambio en \$a afectará 
                directamente a \$b y \$c</p>";

    //Ejercicio 3
    echo "<h2> 3. Muestra el contenido de cada variable inmediatamente después de cada asignación,
        y verificar la evolución del tipo de estas variables:</h2>";
    
    $a = "PHP5";
    $z[] = &$a;
    $b = "5a version de PHP";
    $c = $b*10; // Multiplicación causa un cambio de tipo
    $a .= $b; // Concatenación
    $b *= $c;
    $z[0] = “MySQL”;
        
    echo "$a <br>"; // PHP55a version de PHP
    echo "$b <br>"; // 5a version de PHP
    echo "$c <br>"; // 0 (si $b no puede ser convertido a número)
    echo "$z <br>";
?>
</body>
</html>
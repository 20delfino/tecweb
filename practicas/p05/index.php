<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title> Práctica 5 </title>
    </head>
<body>
<?php
        //1. Determina cuál de las siguientes variables son válidas y explica por qué:
        //$_myvar, $_7var, myvar, $myvar, $var7, $_element1, $house*5
    echo "<h1> Determina cuál de las siguientes variables son válidas y explica por qué:</h1>";
    echo "<h2> a) \$_myvar, b) \$_7var, c) myvar, d) \$myvar, e) \$var7, f) \$_element1, g) \$house*5 </h2>";
    echo "<h2> Respuesta:</h2>
        <p>Las opciones a, b, d, e y f son las variable válidas, a continuacion se explica por qué las
            opciones c y g no lo son:
        </p>
        <ul>
        <li> c) Toda variable en php debe comenzar con el simbolo de $ lo cual no tiene. </li>
        <li> g) A pesar de que la variable empieza por el simbolo $, ésta opcion no es correcta ya que incluye 
            el carácter de *. </li>
        </ul> ";
?>
</body>
</html>
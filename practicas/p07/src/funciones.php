<?php
//Ejercicio 1
function multiplo5y7(){
    if(isset($_GET['numero']))
    {
        $num = $_GET['numero'];
        if ($num%5==0 && $num%7==0)
        {
            echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
        }
        else
        {
            echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
        }
    }
}

//Ejercicio 2
function matriz() {
    $fila = [];
    $iteraciones = 0;

    do {
        $numero1 = rand(1, 1000);
        $numero2 = rand(1, 1000);
        $numero3 = rand(1, 1000);

        if ($numero1 % 2 != 0 && $numero2 % 2 == 0 && $numero3 % 2 != 0) {
            $fila[] = [$numero1, $numero2, $numero3];
        }

        $iteraciones++;
    } while (count($fila) < 1); // Repite hasta obtener la secuencia.

    return ['fila' => $fila, 'iteraciones' => $iteraciones];
}
//Ejercicio 3
function MultiploWhile($numero) {
    $aleatorio = 0;

    while (true) {
        $aleatorio = rand(1, 1000);
        if ($aleatorio % $numero == 0) {
            break;
        }
    }

    return $aleatorio;
}

function MultiploDoWhile($numero) {
    do {
        $aleatorio = rand(1, 1000);
    } while ($aleatorio % $numero != 0);

    return $aleatorio;
}

//Ejercicio 4
function ArregloLetras() {
    $arreglo = [];

    for ($i = 97; $i <= 122; $i++) {
        $arreglo[$i] = chr($i);
    }

    return $arreglo;
}

?>

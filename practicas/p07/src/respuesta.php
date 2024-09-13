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
    // Ejercicio 6 - Arreglo asociativo
    $vehiculos = [
        'ABC1234' => [
            'Auto' => [
                'marca' => 'HONDA',
                'modelo' => '2020',
                'tipo' => 'camioneta'
            ],
            'Propietario' => [
                'nombre' => 'Alfonzo Esparza',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'C.U., Jardines de San Manuel'
            ]
        ],
        'XYZ5678' => [
            'Auto' => [
                'marca' => 'MAZDA',
                'modelo' => '2019',
                'tipo' => 'sedan'
            ],
            'Propietario' => [
                'nombre' => 'Ma. del Consuelo Molina',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => '97 oriente'
            ]
        ],
        'OPQ2345' => [
        'Auto' => [
            'marca' => 'NISSAN',
            'modelo' => '2018',
            'tipo' => 'camioneta'
        ],
        'Propietario' => [
            'nombre' => 'Ana López',
            'ciudad' => 'Puebla, Pue.',
            'direccion' => 'Calle 4, Col. El Mirador'
        ]
        ],
        'RST6789' => [
        'Auto' => [
            'marca' => 'FORD',
            'modelo' => '2017',
            'tipo' => 'hachback'
        ],
        'Propietario' => [
            'nombre' => 'Carlos Gómez',
            'ciudad' => 'Puebla, Pue.',
            'direccion' => 'Calle 6, Col. Santa María'
        ]
        ],
        'UVW0123' => [
            'Auto' => [
                'marca' => 'BMW',
                'modelo' => '2022',
                'tipo' => 'sedan'
            ],
            'Propietario' => [
                'nombre' => 'Gabriela Torres',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Calle 8, Col. La Paz'
            ]
        ],
        'XYZ4567' => [
            'Auto' => [
                'marca' => 'MERCEDES',
                'modelo' => '2019',
                'tipo' => 'camioneta'
            ],
            'Propietario' => [
                'nombre' => 'Ricardo Martínez',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Av. Insurgentes 567, Col. Angelópolis'
            ]
        ],
        'DEF8901' => [
            'Auto' => [
                'marca' => 'AUDI',
                'modelo' => '2020',
                'tipo' => 'sedan'
            ],
            'Propietario' => [
                'nombre' => 'Laura Martínez',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Av. Vallarta 234, Col. Chapultepec'
            ]
        ],
        'GHI2345' => [
            'Auto' => [
                'marca' => 'VOLKSWAGEN',
                'modelo' => '2018',
                'tipo' => 'hachback'
            ],
            'Propietario' => [
                'nombre' => 'Luis Hernández',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Calle 12, Col. Bosques de Chapultepec'
            ]
        ],
        'JKL6789' => [
            'Auto' => [
                'marca' => 'CHEVROLET',
                'modelo' => '2021',
                'tipo' => 'camioneta'
            ],
            'Propietario' => [
                'nombre' => 'Patricia Gómez',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Calle 15, Col. La Margarita'
            ]
        ],
        'MNO0123' => [
            'Auto' => [
                'marca' => 'JEEP',
                'modelo' => '2017',
                'tipo' => 'camioneta'
            ],
            'Propietario' => [
                'nombre' => 'Fernando Ruiz',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Calle 20, Col. Las Ánimas'
            ]
        ],
        'PQR4567' => [
            'Auto' => [
                'marca' => 'SUBARU',
                'modelo' => '2019',
                'tipo' => 'sedan'
            ],
            'Propietario' => [
                'nombre' => 'Alejandra Martínez',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Calle 22, Col. La Paz'
            ]
        ],
        'STU8901' => [
            'Auto' => [
                'marca' => 'KIA',
                'modelo' => '2020',
                'tipo' => 'hachback'
            ],
            'Propietario' => [
                'nombre' => 'Samuel López',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Calle 25, Col. San Pedro'
            ]
        ],
        'VWX2345' => [
            'Auto' => [
                'marca' => 'HONDA',
                'modelo' => '2021',
                'tipo' => 'sedan'
            ],
            'Propietario' => [
                'nombre' => 'Gabriela Torres',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Calle 28, Col. Villa Verde'
            ]
        ],
        'YZA6789' => [
            'Auto' => [
                'marca' => 'MAZDA',
                'modelo' => '2018',
                'tipo' => 'camioneta'
            ],
            'Propietario' => [
                'nombre' => 'Jorge Rodríguez',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Calle 30, Col. Valle de San Javier'
            ]
        ],
        'BCD8901' => [
            'Auto' => [
                'marca' => 'TOYOTA',
                'modelo' => '2019',
                'tipo' => 'hachback'
            ],
            'Propietario' => [
                'nombre' => 'Fernanda Martínez',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Calle 32, Col. El Cristal'
            ]
        ],
        'EFG1234' => [
            'Auto' => [
                'marca' => 'NISSAN',
                'modelo' => '2021',
                'tipo' => 'sedan'
            ],
            'Propietario' => [
                'nombre' => 'Roberto García',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Calle 35, Col. La Vista'
            ]
        ],
        'HIJ5678' => [
            'Auto' => [
                'marca' => 'FORD',
                'modelo' => '2020',
                'tipo' => 'camioneta'
            ],
            'Propietario' => [
                'nombre' => 'Daniela Gómez',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Calle 38, Col. Los Pinos'
            ]
        ]
    ];
    // Consultar 
    if (isset($_POST['buscar'])) {
        $matricula = $_POST['matricula'];

        if (isset($vehiculos[$matricula])) {
            echo "<h2>Información del Vehículo con Matrícula $matricula</h2>";
            echo "<pre>";
            print_r($vehiculos[$matricula]);
            echo "</pre>";
        } else {
            echo "<p>No se encontró el vehículo con matrícula $matricula.</p>";
        }
    }

    // Mostrar todos los vehículos
    if (isset($_POST['mostrar_todos'])) {
        echo "<h2>Todos los Vehículos Registrados</h2>";
        echo "<pre>";
        print_r($vehiculos);
        echo "</pre>";
    }
?>


</body>
</html>

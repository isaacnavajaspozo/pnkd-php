<?php
// Datos simulados de la tabla, puedes cambiar esto por datos de tu base de datos
$jsonSet = [
    [
        "nombre" => "/bin",
        "definicion" => "Dentro de esta carpeta encontrarás archivos ejecutables desde php para crear plantillas de MVC.",
        "info" => [
            "posicion" => "Desarrollador",
            "oficina" => "Oficina A",
            "edad" => 30,
            "fecha_inicio" => "2021-01-15",
            "salario" => "$3000"
        ]
    ],
    [
        "nombre" => "/etc",
        "definicion" => "Aquí es donde se encuentran los archivos de configuración que afectan al comportamiento del sistema.",
        "info" => [
            "posicion" => "Administrador",
            "oficina" => "Oficina B",
            "edad" => 40,
            "fecha_inicio" => "2018-07-10",
            "salario" => "$3500"
        ]
    ],
    [
        "nombre" => "/srv",
        "definicion" => "Archivos destinados para el servidor web, como parte final del proyecto.",
        "info" => [
            "posicion" => "Ingeniero de Sistemas",
            "oficina" => "Oficina C",
            "edad" => 28,
            "fecha_inicio" => "2022-05-20",
            "salario" => "$3200"
        ]
    ],
    [
        "nombre" => "/tmp",
        "definicion" => "La aplicación puede escribir aquí archivos temporales que no se necesitan conservar una vez se cierra la aplicación.",
        "info" => [
            "posicion" => "Operador",
            "oficina" => "Oficina D",
            "edad" => 25,
            "fecha_inicio" => "2023-08-01",
            "salario" => "$2500"
        ]
    ],
    [
        "nombre" => "/var",
        "definicion" => "Contiene archivos de datos variables que cambian con el tiempo.",
        "info" => [
            "posicion" => "Analista",
            "oficina" => "Oficina E",
            "edad" => 35,
            "fecha_inicio" => "2019-03-15",
            "salario" => "$2800"
        ]
    ]
];

// Convertir a JSON
$jsonFolders = json_encode($jsonSet);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./srv/public/src/DRAGON.png">
    <title>Pnkd php</title>
    <!-- Agrego mí Css -->
    <link rel="stylesheet" href="./srv/public/src/css/style.css">
    <!-- Agrego Librerías -->
    <link rel="stylesheet" href="./srv/public/libraries/Bootstrap-5.3.3/bootstrap.min.css">
    <link rel="stylesheet" href="./srv/public/libraries/Bootstrap-5.3.3/Icons/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./srv/public/libraries/Highlight-11.10.0/default.min.css">
    <link rel="stylesheet" href="./srv/public/libraries/DataTables-2.1.5/datatables.min.css">
    <link rel="stylesheet" href="./srv/public/libraries/DataTables-2.1.5/dataTables.bootstrap5.min.css">

    <!-- Agrego tipografias personalizadas-->
    <link href="./srv/public/src/fonts/Ungai.otf" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jersey+10&family=Pacifico&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Homemade+Apple&family=Jacquard+12&display=swap');

        :root {
            --color-Pinkragon: #373737;
            --color-Pinkragon-2: black;
            --color-Pink: #e16fa1;
        }

        body {
            background-color: #f7f7f7;
        }

        #Pikragon {
            width: 250px !important;
        }

        .fontPinkragon {
            /*font-family: "Pacifico", cursive;*/
            font-family: "Jacquard 12", system-ui;
            font-weight: 600;
            font-style: normal;
            font-size: 70px;
            color: var(--color-Pinkragon);
        }

        h2 {
            font-size: 55px !important;
        }

        .boton {
            display: inline-block;
            padding: 10px 20px;
            margin-right: 10px;
            /* Espacio entre botones */
            background-color: #373737 !important;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;

            text-decoration: none;
            padding: 10px 20px;
            background-color: var(--color-oso);
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            font-size: 13px;
            line-height: 10px;
        }

        .colorLetra {
            color: var(--color-Pinkragon);
        }

        .colorLetra {
            color: var(--color-Pinkragon-2);
        }

        .container {
            padding-top: 50px;
        }

        .nav-link {
            z-index: 2;
        }

        .text-pink {
            color: var(--color-Pink);
        }

        .nav-tabs {
            width: 99%;
            margin: auto;
        }

        /*estilos para el scroll*/
        .bloque-tab-1 {
            top: -1px;
            height: 450px;
            overflow-y: auto;
        }

        .bloque-tab-2 {
            height: 340px;
            overflow-y: auto;
        }

        .bloque-tab-1::-webkit-scrollbar,
        .bloque-tab-2::-webkit-scrollbar {
            width: 8px;
            height: 10px;
        }

        .bloque-tab-1::-webkit-scrollbar-track,
        .bloque-tab-2::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .bloque-tab-1::-webkit-scrollbar-thumb,
        .bloque-tab-2::-webkit-scrollbar-thumb {
            background: var(--color-Pinkragon);
            border-radius: 10px;
        }

        .bloque-tab-1::-webkit-scrollbar-corner,
        .bloque-tab-2::-webkit-scrollbar-corner {
            background: #000;
        }

        .tab-pane {
            opacity: 1 !important;
            transition: none !important;
        }

        pre code {
            border-radius: 10px;
        }

        canvas {
            max-width: 600px;
            max-height: 600px;
            margin: auto;
            display: block;
        }

        tr:hover {
            cursor: pointer;
        }

        tr:hover .dt-hasChild .shown {
            cursor: normal;
        }
    </style>

<body>

    <!-- Content -->
    <div class="container">

        <main class="py-5">
            <div class="row">
                <aside class="col-md-3">
                    <img src="./srv/public/src/DRAGON.png" alt="Pikragon" id="Pikragon" class="col-12">
                </aside>

                <section class="col-md-9 ps-5">
                    <h1 class="fontPinkragon">Pnkd php</h1>

                    <div class="card mb-4">
                        <div class="card-body">
                            <p class="card-text">Pnkd es un framework PHP creado por Isaac Navajas Pozo, pensado para
                                proporcionar una experiencia de desarrollo escalable y con un enfoque especializado en
                                ciberseguridad. Este kernel php destaca por su flexibilidad y su sistema de directorios
                                inspirado en Linux, lo que lo hace ideal para adaptarse a las necesidades de cualquier
                                tipo de proyecto, desde los más sencillos hasta los más complejos.</p>
                            <p><i class="bi bi-folder2-open"></i> Versión del framework: <span
                                    style="color:var(--color-Pink);">
                                    <?= $data["version"]; ?>
                                </span></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <a href="https://github.com/isaacnavajaspozo/pnkd-php/archive/refs/heads/main.zip"
                                alt="Descargar Dragon" class="boton"><i class="bi bi-database-fill-down"
                                    style="color:white; padding-right:5px;"></i> Descargar Framework</a>
                            <a href="https://github.com/isaacnavajaspozo" alt="Descargar Dragon" class="boton"
                                target="_blank"><i class="bi bi-github" style="color:white; padding-right:5px;"></i>
                                GitHub</a>
                            <a href="https://pnkd.gitbook.io/" alt="Descargar Dragon" class="boton" target="_blank"><i
                                    class="bi bi-bookmark-heart-fill" style="color:white; padding-right:5px;"></i>
                                Documentación</a>
                            <a href="https://www.linkedin.com/in/isaac-navajas-pozo/" alt="Descargar Dragon"
                                class="boton" target="_blank" style="background-color:var(--color-Pink) !important;"><i
                                    class="bi bi-linkedin" style="color:white; padding-right:5px;"></i> Contactar</a>
                        </div>
                    </div>
                </section>
            </div>



            <!--tabs-->
            <div class="row">
                <main class="py-5">
                    <h2 class="fontPinkragon text-center">Versiones</h2>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="card bloque-tab-1">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <p><strong style="color: var(--color-Pinkragon);">Versión
                                                1.0.2:</strong></p>
                                        <p class="text-pink">
                                            <i class="bi bi-paperclip" style="padding-right:5px;"></i>
                                            Oerganización de sistema de carpetas similar a Linux.
                                        </p>

                                        <p class="text-pink">
                                            <i class="bi bi-paperclip" style="padding-right:5px;"></i>
                                            Mejora de seguridad.
                                        </p>

                                        <p class="text-pink">
                                            <i class="bi bi-paperclip" style="padding-right:5px;"></i>
                                            Conexión con la base de datos por PDO.
                                        </p>

                                        <p class="text-pink">
                                            <i class="bi bi-paperclip" style="padding-right:5px;"></i>
                                            ORM con consultas preparadas para evitar SQL Injection.
                                        </p>

                                        <p class="text-pink">
                                            <i class="bi bi-paperclip" style="padding-right:5px;"></i>
                                            Mejora de seguridad.
                                        </p>

                                        <p class="text-pink">
                                            <i class="bi bi-paperclip" style="padding-right:5px;"></i>
                                            Helper práctico para depurar código.
                                        </p>

                                        <p class="text-pink">
                                            <i class="bi bi-paperclip" style="padding-right:5px;"></i>
                                            Helper práctico para generar tokens.
                                        </p>

                                        <p class="text-pink">
                                            <i class="bi bi-paperclip" style="padding-right:5px;"></i>
                                            Helper práctico para encriptar contraseñas.
                                        </p>

                                        <br>
                                        <p><strong style="color: var(--color-Pinkragon);">Versión 1.0.1:</strong></p>
                                        <p class="text-pink">
                                            <i class="bi bi-paperclip" style="padding-right:5px;"></i>
                                            Oerganización de sistema de carpetas simple.
                                        </p>

                                        <p class="text-pink">
                                            <i class="bi bi-paperclip" style="padding-right:5px;"></i>
                                            Archivo creado: .htaccess generico.
                                        </p>

                                        <p class="text-pink">
                                            <i class="bi bi-paperclip" style="padding-right:5px;"></i>
                                            Archivo creado: deployer.php sin terminar.
                                        </p>

                                        <p class="text-pink">
                                            <i class="bi bi-paperclip" style="padding-right:5px;"></i>
                                            Conexión con la base de datos por mysqli.
                                        </p>

                                        <p class="text-pink">
                                            <i class="bi bi-paperclip" style="padding-right:5px;"></i>
                                            Sistema de MVC organizado y creado.
                                        </p>

                                        <p class="text-pink">
                                            <i class="bi bi-paperclip" style="padding-right:5px;"></i>
                                            Sistema de Helpers sin terminar.
                                        </p>

                                        <p class="text-pink">
                                            <i class="bi bi-paperclip" style="padding-right:5px;"></i>
                                            Sistema de routers organizado y terminado.
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </main>
            </div>

            <div class="row ">

                <h2 class="fontPinkragon text-center">Sistema de carpetas</h2>

                <section class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="myRadarChart"></canvas>
                        </div>
                    </div>
                </section>

                <section class="col-md-8">
                    <div class="card bloque-tab-2">
                        <div class="card-body">
                            <table id="example" class="table table-striped table-bordered" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Definición</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($jsonSet as $dataSet): ?>
                                        <tr>
                                            <td><?php echo $dataSet['nombre']; ?></td>
                                            <td><?php echo $dataSet['definicion']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>


                <div class="row py-5">

                    <h2 class="fontPinkragon text-center">Kernel</h2>
                    <div class="row">
                        <div class="col-7">
                            <?php if ($data["kernelFile"] == true): ?>
                                <div>
                                    <p class="alert alert-primary"><i class="bi bi-shield-fill-check"></i>
                                        <strong>El archivo Kernel.php existe</strong>
                                    </p>
                                </div>
                            <?php else: ?>
                                <p class="alert alert-danger"><i class="bi bi-shield-fill-exclamation"></i>
                                    <strong>El archivo Kernel.php no existe</strong>
                                </p>
                            <?php endif; ?>

                            <?php if ($data['ORMDir'] == true): ?>
                                <div>
                                    <p class="alert alert-primary"><i class="bi bi-shield-fill-check"></i>
                                        <strong>La carpeta ORM existe</strong>
                                    </p>
                                </div>
                            <?php else: ?>
                                <p class="alert alert-danger"><i class="bi bi-shield-fill-exclamation"></i>
                                    <strong>La carpeta ORM no existe</strong>
                                </p>
                            <?php endif; ?>
                        </div>

                        <div class="col-5">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent
                                libero.
                                Sed
                                cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis
                                sagittis
                                ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa.
                                Vestibulum
                                lacinia arcu eget nulla.

                                Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                                himenaeos.
                                Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor.
                                Pellentesque
                                nibh. Aenean quam. In scelerisque sem at dolor.
                            </p>
                        </div>
                    </div>
                    </section>

                </div>
            </div>


        </main>
    </div>




    <!--agrego librerías de javascript-->
    <script src="./srv/public/libraries/Bootstrap-5.3.3/bootstrap.min.js"></script>
    <script src="./srv/public/libraries/Bootstrap-5.3.3/bootstrap.bundle.min.js"></script>
    <script src="./srv/public/libraries/Highlight-11.10.0/highlight.min.js"></script>
    <script src="./srv/public/libraries/Highlight-11.10.0/highlightjs-line-numbers.js"></script>
    <script src="./srv/public/libraries/ChartJS-4.4.4/chart.min.js"></script>
    <script src="./srv/public/libraries/JQuery-3.7.1/jquery.min.js"></script>
    <script src="./srv/public/libraries/DataTables-2.1.5/datatables.min.js"></script>

    <!--activo la librería de highlightjs-->
    <script>
        hljs.highlightAll();
        hljs.initLineNumbersOnLoad();
    </script>

    <!--Configuro Chart.js-->
    <script>
        const rootStyles = getComputedStyle(document.documentElement);
        const colorPink = rootStyles.getPropertyValue('--color-Pink').trim();

        const data = {
            labels: ['/bin', '/etc', '/srv', '/tmp', '/var'],
            datasets: [{
                label: 'Uso optimización: ',
                data: [40, 79, 90, 60, 50],
                fill: true,
                backgroundColor: `${colorPink}29`, // Usa la variable de color
                borderColor: `${colorPink}8F`, // Usa la variable de color
            }]
        };

        const config = {
            type: 'radar',
            data: data,
            options: {
                responsive: true,
                scales: {
                    r: {
                        suggestedMin: 40, // Valor mínimo sugerido
                        suggestedMax: 100, // Valor máximo sugerido

                        grid: {
                            color: '#c7c7c7', // Usa la variable de color
                            lineWidth: 1 // Ancho de las líneas de la cuadrícula
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false // Oculta la leyenda
                    },
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                return tooltipItem.dataset.label + ' ' + tooltipItem.raw + '%'; // Añade el símbolo de %
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'nearest'
                },
                elements: {
                    line: {
                        tension: 0.1 // Suaviza las líneas del gráfico, puedes ajustar este valor
                    }
                }
            }
        };


        window.onload = () => {
            const ctx = document.getElementById('myRadarChart').getContext('2d');
            new Chart(ctx, config);
        };
    </script>


    <!-- jQuery y DataTables JS -->

    <script>
        $(document).ready(function () {
            // Cargar el JSON desde PHP
            var jsonSet = <?php echo $jsonFolders; ?>;

            var table = $('#example').DataTable({
                paging: false,
                searching: false,
                info: false
            });

            // Evento de doble clic en cualquier fila
            $('#example tbody').on('dblclick', 'tr', function () {
                var index = $(this).index(); // Obtener el índice de la fila
                var rowData = jsonSet[index]; // Obtener datos del JSON

                // Verificar si la fila ya tiene detalles
                if ($(this).next('.details-row').length) {
                    $(this).next('.details-row').remove(); // Eliminar si ya existe
                } else {
                    // Crear una fila de detalles
                    var detailRow = `
                    <tr class="details-row">
                        <td colspan="2">
                            <div class="card" style="margin: 10px;">
                                <div class="card-body">
                                    <h5 class="card-title">Detalles de ${rowData.nombre}</h5>
                                    <p class="card-text"><b>Posición:</b> ${rowData.info.posicion}</p>
                                    <p class="card-text"><b>Oficina:</b> ${rowData.info.oficina}</p>
                                    <p class="card-text"><b>Edad:</b> ${rowData.info.edad}</p>
                                    <p class="card-text"><b>Fecha de Inicio:</b> ${rowData.info.fecha_inicio}</p>
                                    <p class="card-text"><b>Salario:</b> ${rowData.info.salario}</p>
                                    <p class="card-text"><b>Más información:</b> Aquí puedes agregar más detalles sobre esta fila.</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                `;
                    $(this).after(detailRow); // Insertar después de la fila seleccionada
                }
            });
        });
    </script>

</body>

</html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./App/Public/Src/ODIN.png">
    <title>Isaac Navajas Pozo · ODIN framework php</title>
    <!-- Agrego mí Css -->
    <link rel="stylesheet" href="/App/Public/Src/Css/style.css">
    <!-- Agrego Librerías -->
    <link rel="stylesheet" href="/App/Public/Bookstores/Bootstrap-5.3.3/bootstrap.min.css">
    <link rel="stylesheet" href="/App/Public/Bookstores/Bootstrap-5.3.3/Icons/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/App/Public/Bookstores/Highlight-11.10.0/default.min.css">
    <link rel="stylesheet" href="/App/Public/Bookstores/DataTables-2.1.5/datatables.min.css">
    <link rel="stylesheet" href="/App/Public/Bookstores/DataTables-2.1.5/dataTables.bootstrap5.min.css">

    

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jersey+10&family=Pacifico&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Homemade+Apple&family=Jacquard+12&display=swap');
/*--color-Pinkragon: #373737;--color-Pink: #f223c4*/
        :root {
            --color-Pinkragon: #373737;
            --color-Pinkragon-2: black;
            --color-Pink: #fff100;
        }

        body {
            background-color: #f7f7f7;
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
            background-color: #007bff;
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
        
        .colorLetra{color:var(--color-Pinkragon);}
        .colorLetra{color:var(--color-Pinkragon-2);}
        
        .container {
            padding-top: 50px;
        }
        
        .nav-link{z-index:2;}
        
        .nav-link:focus, .nav-link:hover{color:var(--color-Pink);}
        
        .nav-tabs{
            width:99%; 
            margin:auto;
        }
        
        /*estilos para el scroll*/
        .bloque-tab-1{
            top:-1px;
            height:600px;
            overflow-y: auto;
        }
        
        .bloque-tab-2{
            height: 335px; 
            overflow-y: auto;
        }
                
        .bloque-tab-1::-webkit-scrollbar, .bloque-tab-2::-webkit-scrollbar {
            width: 8px; 
            height: 10px; 
        }
        
        .bloque-tab-1::-webkit-scrollbar-track, .bloque-tab-2::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px; 
        }
        
        .bloque-tab-1::-webkit-scrollbar-thumb, .bloque-tab-2::-webkit-scrollbar-thumb {
            background: var(--color-Pinkragon);
            border-radius: 10px;
        }
        
        .bloque-tab-1::-webkit-scrollbar-corner, .bloque-tab-2::-webkit-scrollbar-corner {
            background: #000;
        }

        .tab-pane {
            opacity: 1 !important;
            transition: none !important;
        }

        pre code{
            border-radius:10px;
        }

        canvas {
            max-width: 600px;
            max-height: 600px;
            margin: auto;
            display: block;
        }
        
        tr:hover{
             cursor:pointer;
        }
        tr:hover .dt-hasChild .shown{
             cursor:normal;
        }


    </style>

<body>

    <!-- Content -->
    <div class="container">

        <main class="py-5">
            <div class="row">
                <aside class="col-md-3">
                    <img src="./App/Public/Src/ODIN.png" alt="Pikragon" id="Pikragon" class="col-12">
                </aside>

                <section class="col-md-9 ps-5">
                    <h1 class="fontPinkragon">Odin php</h1>

                    <div class="card mb-4">
                        <div class="card-body">
                            <p class="card-text">Pinkragon es un framework PHP desarrollado por Isaac Navajas Pozo para
                                ofrecer una experiencia de diseño intuitiva y escalable. Con Pinkragon, disfrutarás
                                de un framework flexible y fácil de usar, adaptado para satisfacer las necesidades de
                                cualquier proyecto, desde los más simples hasta los más complejos.</p>
                            <p><i class="bi bi-folder2-open"></i> Versión del framework: <span
                                    style="color:var(--color-Pink);">
                                    <?= $data["version"]; ?>
                                </span></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <a href="https://github.com/isaacnavajaspozo/Pinkragon-php/archive/refs/heads/main.zip" alt="Descargar Dragon" class="boton"><i class="bi bi-database-fill-down" style="color:white; padding-right:5px;"></i> Descargar Framework</a>
                            <a href="https://github.com/isaacnavajaspozo" alt="Descargar Dragon" class="boton" target="_blank"><i class="bi bi-github" style="color:white; padding-right:5px;"></i> GitHub</a>
                            <a href="https://www.linkedin.com/in/isaac-navajas-pozo/" alt="Descargar Dragon" class="boton" target="_blank" style="background-color:var(--color-Pink) !important;" ><i class="bi bi-linkedin" style="color:white; padding-right:5px;"></i> Contactar</a>
                        </div>
                    </div>
                </section>
            </div>



            <!--tabs-->
            <div class="row">
                <main class="py-5">
                    <h2 class="fontPinkragon text-center">Aplicaciones prácticas</h2>
                    <nav>
                        <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                            <button class="nav-link active colorLetra" id="nav-installation-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-installation" type="button" role="tab" aria-controls="nav-installation"
                                aria-selected="true">Instalación</button>
                            <button class="nav-link colorLetra" id="nav-controllers-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-controllers" type="button" role="tab" aria-controls="nav-controllers"
                                aria-selected="false">Controladores</button>
                            <button class="nav-link colorLetra" id="nav-models-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-models" type="button" role="tab" aria-controls="nav-models"
                                aria-selected="false">Modelos</button>
                            <button class="nav-link colorLetra" id="nav-views-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-views" type="button" role="tab" aria-controls="nav-views"
                                aria-selected="false">Vistas</button>
                            <button class="nav-link colorLetra" id="nav-public-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-public" type="button" role="tab" aria-controls="nav-public"
                                aria-selected="false">Carpeta Public</button>
                            <button class="nav-link colorLetra" id="nav-routers-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-routers" type="button" role="tab" aria-controls="nav-routers"
                                aria-selected="false">Rutas</button>
                            <button class="nav-link colorLetra" id="nav-Pinkragon-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-helpers" type="button" role="tab" aria-controls="nav-helpers"
                                aria-selected="false">Helpers</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        
                        <div class="tab-pane show active" id="nav-installation" role="tabpanel" aria-labelledby="nav-installation-tab">
                            <div class="card bloque-tab-1">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
        <pre><code class="language-html"> &lt;!DOCTYPE html&gt;
        &lt;html lang="es"&gt;
        &lt;head&gt;
            &lt;meta charset="UTF-8"&gt;
            &lt;title&gt;Ejemplo&lt;/title&gt;
        &lt;/head&gt;
        &lt;body&gt;
            &lt;h1&gt;Hola, Mundo!&lt;/h1&gt;
        &lt;/body&gt;
 &lt;/html&gt;
        </code></pre>

                                        </div>
                                        
                                        <div class="col-6">
                                            <p>installation</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                        
                        <div class="tab-pane fade" id="nav-controllers" role="tabpanel" aria-labelledby="nav-controllers-tab">
                            <div class="card bloque-tab-1">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <p>controllers</p>

                                        </div>
                                        
                                        <div class="col-6">
                                            <p>controllers</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="nav-models" role="tabpanel" aria-labelledby="nav-models-tab">
                                                        <div class="card bloque-tab-1">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <p>models</p>

                                        </div>
                                        
                                        <div class="col-6">
                                            <p>models</p>
  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="nav-views" role="tabpanel" aria-labelledby="nav-views-tab">
                                                        <div class="card bloque-tab-1">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <p>views</p>

                                        </div>
                                        
                                        <div class="col-6">
                                            <p>views</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="nav-public" role="tabpanel" aria-labelledby="nav-public-tab">
                            <div class="card bloque-tab-1">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <p>public</p>
  
                                        </div>
                                        
                                        <div class="col-6">
                                            <p>public</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="nav-routers" role="tabpanel" aria-labelledby="nav-routers-tab">
                                                        <div class="card bloque-tab-1">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <p>routers</p>
                                        </div>
                                        
                                        <div class="col-6">
                                            <p>routers</p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="nav-helpers" role="tabpanel" aria-labelledby="nav-helpers-tab">
                                                        <div class="card bloque-tab-1">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <p>helpers</p>

                                        </div>
                                        
                                        <div class="col-6">
                                            <p>helpers</p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
            </div>
        </main>
 </div>

            <div class="row ">

                    <h2 class="fontPinkragon text-center">Librerías</h2>
                
                <section class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="myRadarChart"></canvas>
                        </div>
                    </div>
                </section>

                <section class="col-md-8">
                    <div class="card bloque-tab-2" >
                        <div class="card-body">
                            
                            

<table id="example" class="table table-striped table-bordered" style="width:100%;">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Posición</th>
            <th>Oficina</th>
            <th>Edad</th>
            <th>Fecha de Inicio</th>
            <th>Salario</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
        </tr>
                <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
        </tr>
                <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
        </tr>
                <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
        </tr>
                <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
        </tr>
                <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
        </tr>
                <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
        </tr>
                <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
        </tr>
                <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
        </tr>
                <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
        </tr>
                <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
        </tr>
    </tbody>
</table>

                            
                        </div>
                    </div>
                </section>
            </div>
             
            
            
            
            <div class="row py-5">

                <h2 class="fontPinkragon text-center">Evaluación del kernel</h2>
                
                <section class="col-md-12">
       


                </section>

            </div>
            </div>  
            
            
    </main>
</div>      




    <!--agrego librerías de javascript-->
    <script src="/App/Public/Bookstores/Bootstrap-5.3.3/bootstrap.min.js"></script>
    <script src="/App/Public/Bookstores/Bootstrap-5.3.3/bootstrap.bundle.min.js"></script>
    <script src="/App/Public/Bookstores/Highlight-11.10.0/highlight.min.js"></script>
    <script src="/App/Public/Bookstores/Highlight-11.10.0/highlightjs-line-numbers.js"></script>
    <script src="/App/Public/Bookstores/ChartJS-4.4.4/chart.min.js"></script>
    <script src="/App/Public/Bookstores/JQuery-3.7.1/jquery.min.js"></script>
    <script src="/App/Public/Bookstores/DataTables-2.1.5/datatables.min.js"></script>
    
    <!--activo la librería de highlightjs-->
    <script>
      hljs.highlightAll();
      hljs.initLineNumbersOnLoad();
    </script>
    
    <!--Configuro Chart.js-->
        <script>

        const data = {
            labels: ['Orc', 'bot', 'man', 'Demon', 'Mage'],
            datasets: [{
                label: 'Mi Dataset',
                data: [65, 59, 90, 81, 56],
                fill: true,
                backgroundColor: '#f223c42b',
                borderColor: '#f223c48f',
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
                        suggestedMax: 1, // Valor máximo sugerido
                        

                        grid: {
                            color: '#c7c7c7', // Color de la cuadrícula
                            lineWidth: 1 // Ancho de las líneas de la cuadrícula
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false // Oculta la leyenda
                    },
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
$(document).ready(function() {
    $('#example2').DataTable({
        paging: true,      // Desactiva la paginación
        searching: true,   // Desactiva el buscador
        info: false         // Desactiva la información de la tabla
    });
    
    var table = $('#example').DataTable({
        paging: false,      // Desactiva la paginación
        searching: false,   // Desactiva el buscador
        info: false         // Desactiva la información de la tabla
    });

    // Evento de doble clic en cualquier celda
    $('#example tbody').on('click', 'td', function() {
        var tr = $(this).closest('tr');
        var row = table.row(tr);

        if (row.child.isShown()) {
            // Si la fila ya está expandida, la oculta
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Si no, la expande
            row.child(format(row.data())).show();
            tr.addClass('shown');
        }
    });

    // Función para formatear la fila expandida con un card de Bootstrap
    function format(d) {
        return `
        <div class="card" style="margin: 10px;">
            <div class="card-body">
                <h5 class="card-title">Detalles de ${d[0]}</h5>
                <p class="card-text"><b>Posición:</b> ${d[1]}</p>
                <p class="card-text"><b>Oficina:</b> ${d[2]}</p>
                <p class="card-text"><b>Edad:</b> ${d[3]}</p>
                <p class="card-text"><b>Fecha de Inicio:</b> ${d[4]}</p>
                <p class="card-text"><b>Salario:</b> ${d[5]}</p>
                <p class="card-text"><b>Más información:</b> Aquí puedes agregar más detalles sobre esta fila.</p>
            </div>
        </div>
        `;
    }
});
</script>

</body>

</html>
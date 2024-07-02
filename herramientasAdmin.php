<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herramientas de Administrador</title>
    <link rel="shortcut icon" href="images/BlueBus_logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="css/herramientas_style.css" rel="stylesheet" type="text/css" />
    <link href="css/navbar.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php require_once "components/navbar.php"; ?>

    <header class="container mt-5 mb-4 text-center">
        <h1 class="display-4">Herramientas de Administrador</h1>
    </header>

    <main class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header custom-header">
                        Mantenimiento
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><a href="crudReserva.php"><i class="bi bi-calendar-check mr-1"></i> Reservas</a></li>
                        <li class="list-group-item"><a href="crudUsuario.php"><i class="bi bi-person mr-1"></i> Usuarios</a></li>
                        <li class="list-group-item"><a href="crudViaje.php"><i class="bi bi-bus-front-fill mr-1"></i> Viajes</a></li>
                        <li class="list-group-item"><a href="crudDestino.php"><i class="bi bi-geo-fill mr-1"></i> Destinos</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header custom-header">
                        Reportes
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="reporteVentas.php"><i class="bi bi-file-text"></i> Ventas</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header custom-header">
                        Reporte de Ventas(Ganancias) por Mes
                    </div>
                    <div class="card-body">
                        <canvas id="ventasPorMesChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer id="contacto" class="bg-info text-white text-center py-4">
        <div class="container">
            <p class="mb-0"><i class="bi bi-telephone"></i> Teléfono: +51 992 568 742 | <i class="bi bi-geo-alt"></i> Dirección: Av. Javier Prado Este 123, San Isidro, Lima, Perú</p>
            <p class="mb-0"><i class="bi bi-envelope"></i> Email: info@bluebus.com</p>
        </div>
    </footer>

    <!-- Scripts de JavaScript y Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Obtener datos de la base de datos usando AJAX
        fetch('obtenerVentasPorMes.php')
            .then(response => response.json())
            .then(data => {
                // Configuración del gráfico
                const ventasPorMes = {
                    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    datasets: [{
                        label: 'Ventas',
                        data: data,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                };

                const config = {
                    type: 'bar',
                    data: ventasPorMes,
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        animation: {
                            duration: 1000, // Duración de la animación en milisegundos
                        },
                        plugins: {
                            legend: {
                                display: true,
                                labels: {
                                    color: 'rgb(255, 99, 132)'
                                }
                            }
                        }
                    }
                };

                // Inicialización del gráfico
                const ventasPorMesChart = new Chart(
                    document.getElementById('ventasPorMesChart'),
                    config
                );
            });
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador | Viajes</title>
    <link rel="shortcut icon" href="images/BlueBus_logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="css/crud_styles.css" rel="stylesheet" type="text/css" />
    <link href="css/navbar.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>

<body>
    <!-- Navbar -->
    <?php require_once "components/navbar.php"; ?>

    <!-- Header -->
    <header class="container mt-5 mb-4 text-center">
        <h1 class="display-4">Mantenimiento de Viajes</h1>
    </header>

    <!-- Main content -->
    <main class="container mb-5">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>COD_VIA</th>
                        <th>FECHA_VIA</th>
                        <th>HORA_VIA</th>
                        <th>DURACION</th>
                        <th>BUS</th>
                        <th>ORIGEN</th>
                        <th>DESTINO</th>
                        <th>PRECIO_BASE</th>
                        <th>HERRAMIENTAS CRUD</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Ejemplo de fila de la tabla, borrar luego :)-->
                    <tr>
                        <td>V001</td>
                        <td>2024-07-01</td>
                        <td>08:00</td>
                        <td>4h</td>
                        <td>Bus A</td>
                        <td>Lima</td>
                        <td>Cusco</td>
                        <td>100.00</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-success btn-crud" title="Añadir"><i class="bi bi-plus"></i></a>
                            <a href="#" class="btn btn-sm btn-warning btn-crud" title="Editar"><i class="bi bi-pencil"></i></a>
                            <a href="#" class="btn btn-sm btn-danger btn-crud" title="Eliminar"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    <!-- Agregar más filas aquí -->
                </tbody>
            </table>
        </div>
    </main>

    <!-- Footer -->
    <footer id="contacto" class="text-white text-center py-4 mt-auto">
        <div class="container">
            <p class="mb-0"><i class="bi bi-telephone"></i> Teléfono: +51 992 568 742 | <i class="bi bi-geo-alt"></i> Dirección: Av. Javier Prado Este 123, San Isidro, Lima, Perú</p>
            <p class="mb-0"><i class="bi bi-envelope"></i> Email: info@bluebus.com</p>
        </div>
    </footer>

    <!-- Scripts de JavaScript y Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

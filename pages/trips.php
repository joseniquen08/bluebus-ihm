<?php
include_once 'classes/Agencia.php';
include_once 'lib/Conexion.php';

if (isset($_GET['origen'], $_GET['destino'], $_GET['fecha']) && $_GET['origen'] && $_GET['destino'] && $_GET['fecha']) {
	$agencia = new Agencia();
	$origen = $_GET['origen'];
	$destino = $_GET['destino'];
	$fecha = $_GET['fecha'];

	$viajes = $agencia->buscarViajes($origen, $destino, $fecha);
?>
	<!DOCTYPE html>
	<html lang="es">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Resultados de Viajes</title>
		<link rel="shortcut icon" href="assets/images/BlueBus_logo.png" type="image/x-icon">
		<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
		<link href="css/viajes_style.css" rel="stylesheet" type="text/css" />
		<link href="css/navbar.css" rel="stylesheet" type="text/css" />
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
	</head>

	<body class="flex flex-col" style="min-height: 100vh;">
		<?php require_once "components/navbar.php"; ?>

		<?php if (!empty($viajes)) : ?>
			<?php
			$origen_nombre = $agencia->nombreDestino($origen);
			$destino_nombre = $agencia->nombreDestino($destino);
			?>

			<div class="container py-5 flex-1">
				<h1 class="display-4 mb-4 text-center">Resultados de Viajes</h1>
				<p class="text-center">Resultados: <?php echo count($viajes); ?></p>
				<div class="row justify-content-center" id="results-container">
					<?php foreach ($viajes as $viaje) : ?>
						<div class="col-md-10 mb-4 viaje-card" data-price="<?php echo htmlspecialchars($viaje['PRECIO_BASE']); ?>" data-duration="<?php echo htmlspecialchars($viaje['DURACION']); ?>" data-earliest="<?php echo htmlspecialchars($viaje['HORA_VIA']); ?>">
							<div class="card">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-6 col-md-2 text-center">
											<h5 class="card-title"><i class="bi bi-clock"></i> <?php echo htmlspecialchars($viaje['HORA_VIA']); ?></h5>
										</div>
										<div class="col-6 col-md-2 text-center">
											<p class="mb-0"><?php echo htmlspecialchars($origen_nombre); ?></p>
										</div>
										<div class="col-6 col-md-2 text-center">
											<p class="card-text mb-0"><?php echo htmlspecialchars($viaje['DURACION']); ?></p>
											<i class="bi bi-arrow-right"></i>
										</div>
										<div class="col-6 col-md-2 text-center">
											<p class="mb-0"><?php echo htmlspecialchars($destino_nombre); ?></p>
										</div>
										<div class="col-6 col-md-2 text-center">
											<p class="card-text mb-0"><i class="bi bi-calendar4-week"></i> <?php echo htmlspecialchars($viaje['FECHA_VIA']); ?></p>
										</div>
										<div class="col-12 col-md-2 text-center mt-3 mt-md-0">
											<a href="seleccionar_asiento?COD_VIA=<?php echo $viaje['COD_VIA']; ?>" class="btn btn-primary btn-custom-blue">
												Seleccionar Asiento
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php else : ?>
			<h1 class="text-center">No se encontraron viajes para los criterios seleccionados.</h1>
		<?php endif; ?>

		<!-- Pie de Página -->
		<?php require_once "components/footer.php"; ?>

		<!-- Scripts de JavaScript y Bootstrap -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	</body>

	</html>
<?php
} else {
	echo '<h1 class="text-center">Faltan parámetros para realizar la búsqueda.</h1>';
}
?>
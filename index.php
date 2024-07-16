<?php

// Include our class file
require_once("Routes.php");

// Create an instance of RouteMan
$objRoutes = new Routes();

// Configure our pages
$objRoutes->addRoute('inicio', ['file' => 'home.php']);
$objRoutes->addRoute('registro', ['file' => 'register.php']);
$objRoutes->addRoute('login', ['file' => 'login.php']);
$objRoutes->addRoute('viajes', ['file' => 'trips.php']);
$objRoutes->addRoute('seleccionar_asiento', ['file' => 'select_seat.php']);
$objRoutes->addRoute('checkout', ['file' => 'checkout.php']);
$objRoutes->addRoute('nosotros', ['file' => 'about_us.php']);

$objRoutes->addRoute('info/tumbes', ['file' => 'info/tumbes.php']);
$objRoutes->addRoute('info/lima', ['file' => 'info/lima.php']);
$objRoutes->addRoute('info/chimbote', ['file' => 'info/chimbote.php']);
$objRoutes->addRoute('info/chiclayo', ['file' => 'info/chiclayo.php']);
$objRoutes->addRoute('info/arequipa', ['file' => 'info/arequipa.php']);
$objRoutes->addRoute('info/colca', ['file' => 'info/colca.php']);

$objRoutes->addRoute('admin/inicio', ['file' => 'admin/home.php']);
$objRoutes->addRoute('admin/reservas', ['file' => 'admin/bookings.php']);
$objRoutes->addRoute('admin/usuarios', ['file' => 'admin/users.php']);
$objRoutes->addRoute('admin/viajes', ['file' => 'admin/trips.php']);
$objRoutes->addRoute('admin/destinos', ['file' => 'admin/destinations.php']);
$objRoutes->addRoute('admin/reporte/ventas', ['file' => 'admin/report/sales.php']);

// Configure our api's
$objRoutes->addRoute('logout', ['file' => 'api/logout.php']);
$objRoutes->addRoute('api/buscar_viajes', ['file' => 'api/search_trips.php']);
$objRoutes->addRoute('api/procesar_pago', ['file' => 'api/proccess_payment.php']);

$objRoutes->addRoute('api/admin/obtener_ventas_mes', ['file' => 'api/admin/get_sales_by_month.php']);

$objRoutes->addRoute('api/admin/destinos/agregar', ['file' => 'api/admin/destinations/add.php']);

$objRoutes->addRoute('api/admin/reservas/agregar', ['file' => 'api/admin/bookings/add.php']);
$objRoutes->addRoute('api/admin/reservas/editar', ['file' => 'api/admin/bookings/edit.php']);
$objRoutes->addRoute('api/admin/reservas/eliminar', ['file' => 'api/admin/bookings/delete.php']);

// Finally, ask our RoutMan to manage our routes.
$objRoutes->manageRoutes();

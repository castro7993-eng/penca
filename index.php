<?php
/*
----------------------------------------------------
// Copyright (c) 2026 Globaldata Uruguay
// Todos los derechos reservados
// Este software es propiedad confidencial de Globaldata Uruguay
----------------------------------------------------
*/

// Cargador básico de configuración y enrutamiento.
require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/controllers/BaseController.php';
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/DashboardController.php';

$path = $_GET['path'] ?? 'dashboard';

if (!isset($_SESSION['usuario_id']) && $path !== 'login' && $path !== 'auth/login') {
    header('Location: index.php?path=login');
    exit;
}

switch ($path) {
    case 'login':
        (new AuthController())->showLogin();
        break;
    case 'auth/login':
        (new AuthController())->login();
        break;
    case 'auth/logout':
        (new AuthController())->logout();
        break;
    default:
        (new DashboardController())->index();
        break;
}

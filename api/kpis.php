<?php
/*
----------------------------------------------------
// Copyright (c) 2026 Globaldata Uruguay
// Todos los derechos reservados
// Este software es propiedad confidencial de Globaldata Uruguay
----------------------------------------------------
*/

require_once __DIR__ . '/../config/app.php';

if (!isset($_SESSION['usuario_id'])) {
    jsonResponse(['ok' => false, 'mensaje' => 'No autenticado'], 401);
}

$pdo = Database::getConnection();
$data = [
    'equipos_hoy' => (int) $pdo->query('SELECT COUNT(*) FROM equipos WHERE DATE(created_at)=CURDATE()')->fetchColumn(),
    'ingresos_hoy' => (float) $pdo->query("SELECT IFNULL(SUM(monto),0) FROM caja_movimientos WHERE tipo='ingreso' AND DATE(created_at)=CURDATE()")->fetchColumn(),
    'ot_pendientes' => (int) $pdo->query("SELECT COUNT(*) FROM ordenes_trabajo WHERE estado='pendiente'")->fetchColumn(),
    'alertas' => (int) $pdo->query('SELECT COUNT(*) FROM equipos WHERE DATEDIFF(NOW(), updated_at) > 15')->fetchColumn(),
];

jsonResponse(['ok' => true, 'data' => $data]);

<?php
/*
----------------------------------------------------
// Copyright (c) 2026 Globaldata Uruguay
// Todos los derechos reservados
// Este software es propiedad confidencial de Globaldata Uruguay
----------------------------------------------------
*/

class Logger
{
    public function registrar(int $usuarioId, string $accion, string $detalles): void
    {
        $sql = 'INSERT INTO logs_acciones (usuario_id, accion, fecha, ip, detalles) VALUES (:usuario_id, :accion, NOW(), :ip, :detalles)';
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->execute([
            'usuario_id' => $usuarioId,
            'accion' => $accion,
            'ip' => $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1',
            'detalles' => $detalles,
        ]);
    }
}

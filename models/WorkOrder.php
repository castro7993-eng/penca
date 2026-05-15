<?php
/*
----------------------------------------------------
// Copyright (c) 2026 Globaldata Uruguay
// Todos los derechos reservados
// Este software es propiedad confidencial de Globaldata Uruguay
----------------------------------------------------
*/

class WorkOrder
{
    public function generarNumeroOt(): string
    {
        $prefijo = 'OT-' . date('Ymd') . '-';
        $sql = 'SELECT COUNT(*) as total FROM ordenes_trabajo WHERE DATE(fecha_ingreso) = CURDATE()';
        $total = (int) Database::getConnection()->query($sql)->fetch(PDO::FETCH_ASSOC)['total'] + 1;
        return $prefijo . str_pad((string) $total, 4, '0', STR_PAD_LEFT);
    }
}

<?php
/*
----------------------------------------------------
// Copyright (c) 2026 Globaldata Uruguay
// Todos los derechos reservados
// Este software es propiedad confidencial de Globaldata Uruguay
----------------------------------------------------
*/

// Exportador simple de base SQL y carpeta uploads en un ZIP.
require_once __DIR__ . '/../config/app.php';
$zip = new ZipArchive();
$filename = __DIR__ . '/../logs/backup_' . date('Ymd_His') . '.zip';
$zip->open($filename, ZipArchive::CREATE);
$zip->addFile(__DIR__ . '/../sql/schema.sql', 'schema.sql');
foreach (glob(__DIR__ . '/../uploads/*') as $file) {
    if (is_file($file)) $zip->addFile($file, 'uploads/' . basename($file));
}
$zip->close();
jsonResponse(['ok' => true, 'archivo' => basename($filename)]);

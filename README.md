<!--
----------------------------------------------------
// Copyright (c) 2026 Globaldata Uruguay
// Todos los derechos reservados
// Este software es propiedad confidencial de Globaldata Uruguay
----------------------------------------------------
-->

# Sistema de Taller de Reparación de Electrónica

## Instalación paso a paso
1. Crear una base MySQL y ejecutar `sql/schema.sql`.
2. Configurar credenciales en `config/database.php`.
3. Asegurar permisos de escritura en `uploads/` y `logs/`.
4. Levantar servidor con `php -S localhost:8000`.
5. Acceder a `http://localhost:8000/index.php?path=login`.
6. Usuario demo: `admin@taller.com` (definir contraseña según hash en SQL).

## Estructura
- `controllers/`, `models/`, `views/`, `assets/`, `uploads/`, `config/`, `api/`, `logs/`, `sql/`.

## Notas técnicas
- Arquitectura MVC básica con endpoints REST en `api/` para AJAX.
- Modo oscuro con `localStorage`.
- Panel KPI en tiempo real cada 30 segundos.
- Exportación de backup SQL + uploads en ZIP.

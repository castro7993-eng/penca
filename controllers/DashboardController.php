<?php
/*
----------------------------------------------------
// Copyright (c) 2026 Globaldata Uruguay
// Todos los derechos reservados
// Este software es propiedad confidencial de Globaldata Uruguay
----------------------------------------------------
*/

class DashboardController extends BaseController
{
    public function index(): void
    {
        $this->render('dashboard/index');
    }
}

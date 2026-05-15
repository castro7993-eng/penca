<!--
----------------------------------------------------
// Copyright (c) 2026 Globaldata Uruguay
// Todos los derechos reservados
// Este software es propiedad confidencial de Globaldata Uruguay
----------------------------------------------------
-->
<div class="row g-3" id="kpiBoard">
  <div class="col-md-3"><div class="card p-3"><i class="fas fa-box"></i> Equipos hoy: <span data-kpi="equipos_hoy">0</span></div></div>
  <div class="col-md-3"><div class="card p-3"><i class="fas fa-cash-register"></i> Ingresos hoy: $<span data-kpi="ingresos_hoy">0</span></div></div>
  <div class="col-md-3"><div class="card p-3">OT pendientes: <span data-kpi="ot_pendientes">0</span></div></div>
  <div class="col-md-3"><div class="card p-3 text-danger">Alertas +15 días: <span data-kpi="alertas">0</span></div></div>
</div>
<div class="row mt-3">
  <div class="col-12"><canvas id="chartEstados"></canvas></div>
</div>

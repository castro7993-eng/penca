/*
----------------------------------------------------
// Copyright (c) 2026 Globaldata Uruguay
// Todos los derechos reservados
// Este software es propiedad confidencial de Globaldata Uruguay
----------------------------------------------------
*/

// Inicializa eventos globales y modo oscuro persistente.
$(function () {
  const savedTheme = localStorage.getItem('theme') || 'light';
  $('body').attr('data-theme', savedTheme);

  $('#darkModeToggle').on('click', function () {
    const current = $('body').attr('data-theme') === 'dark' ? 'light' : 'dark';
    $('body').attr('data-theme', current);
    localStorage.setItem('theme', current);
  });

  cargarKpis();
  setInterval(cargarKpis, 30000);
});

function cargarKpis() {
  $.getJSON('api/kpis.php', function (res) {
    if (!res.ok) return;
    Object.keys(res.data).forEach(function (key) {
      $('[data-kpi="' + key + '"]').text(res.data[key]);
    });
  });
}

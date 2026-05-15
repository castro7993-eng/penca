<!--
----------------------------------------------------
// Copyright (c) 2026 Globaldata Uruguay
// Todos los derechos reservados
// Este software es propiedad confidencial de Globaldata Uruguay
----------------------------------------------------
-->
<!doctype html><html lang="es"><head><meta charset="utf-8"><title>Login</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="bg-light d-flex align-items-center" style="height:100vh;"><div class="container"><div class="row justify-content-center"><div class="col-md-4"><div class="card p-3"><h4>Ingreso</h4><form id="loginForm"><input class="form-control mb-2" name="email" placeholder="Correo"><input type="password" class="form-control mb-2" name="password" placeholder="Contraseña"><button class="btn btn-primary w-100">Entrar</button></form></div></div></div></div><script src="https://code.jquery.com/jquery-3.7.1.min.js"></script><script>$('#loginForm').on('submit', function(e){e.preventDefault();$.post('index.php?path=auth/login', $(this).serialize()).done(()=>location.href='index.php').fail(x=>alert(x.responseJSON.mensaje));});</script></body></html>

<?php
/*
----------------------------------------------------
// Copyright (c) 2026 Globaldata Uruguay
// Todos los derechos reservados
// Este software es propiedad confidencial de Globaldata Uruguay
----------------------------------------------------
*/

require_once __DIR__ . '/../models/User.php';

class AuthController extends BaseController
{
    public function showLogin(): void
    {
        include __DIR__ . '/../views/auth/login.php';
    }

    public function login(): void
    {
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $usuario = (new User())->findByEmail($email);

        if (!$usuario || !password_verify($password, $usuario['password_hash'])) {
            jsonResponse(['ok' => false, 'mensaje' => 'Credenciales inválidas.'], 401);
        }

        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['rol'] = $usuario['rol'];
        (new Logger())->registrar($usuario['id'], 'inicio_sesion', 'Usuario inició sesión');

        jsonResponse(['ok' => true, 'mensaje' => 'Bienvenido al sistema.']);
    }

    public function logout(): void
    {
        session_destroy();
        header('Location: index.php?path=login');
    }
}

<?php
// auth.php — inclua no TOPO de qualquer página que precise de login
// Uso básico:          require "../auth.php";
// Só para admins:      require "../auth.php"; exigir_admin();

session_start();

/**
 * Redireciona para login se não estiver autenticado.
 * Chame no topo de qualquer página protegida.
 */
function exigir_login() {
    if (empty($_SESSION['id_usuario'])) {
        header("Location: /login.php?erro=acesso");
        exit;
    }
}

/**
 * Redireciona para index se não for admin.
 * Use após exigir_login().
 */
function exigir_admin() {
    exigir_login();
    if ($_SESSION['tipo'] !== 'admin') {
        header("Location: /index.php");
        exit;
    }
}

/**
 * Retorna true se o usuário logado for admin.
 */
function is_admin() {
    return isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'admin';
}

/**
 * Retorna true se houver alguém logado.
 */
function esta_logado() {
    return !empty($_SESSION['id_usuario']);
}
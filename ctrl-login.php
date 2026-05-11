<?php
session_start();

$email_user = $_POST['email_user'] ?? '';
$senha      = $_POST['senha'] ?? '';

// Conecta ao banco
$conn = new PDO("sqlite:banco.db");

// Busca o usuário pelo email
$stmt = $conn->prepare("
    SELECT id_usuario, nome_user, email_user, senha, tipo
    FROM usuarios
    WHERE email_user = :email_user
");
$stmt->bindValue(':email_user', $email_user);
$stmt->execute();

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se encontrou e se a senha bate
// Suporta senha em texto puro E senha com password_hash
$senha_correta = false;

if ($usuario) {
    if (password_verify($senha, $usuario['senha'])) {
        // Senha com hash (recomendado)
        $senha_correta = true;
    } elseif ($senha === $usuario['senha']) {
        // Senha em texto puro (compatibilidade com cadastros antigos)
        $senha_correta = true;
    }
}

if ($usuario && $senha_correta) {
    // Login OK — salva dados na sessão
    $_SESSION['id_usuario']  = $usuario['id_usuario'];
    $_SESSION['nome_user']   = $usuario['nome_user'];
    $_SESSION['email_user']  = $usuario['email_user'];
    $_SESSION['tipo']        = $usuario['tipo'];

    header("Location: index.php");
    exit;
} else {
    // Credenciais erradas
    header("Location: login.php?erro=credenciais");
    exit;
}
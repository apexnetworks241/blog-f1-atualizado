<?php
session_start();

$nome_user  = trim($_POST['nome_user']  ?? '');
$email_user = trim($_POST['email_user'] ?? '');
$senha      = $_POST['senha'] ?? '';

// Valida campos obrigatórios
if (empty($nome_user) || empty($email_user) || empty($senha)) {
    header("Location: login.php?erro_cad=campos");
    exit;
}

// Valida tamanho mínimo da senha
if (strlen($senha) < 6) {
    header("Location: login.php?erro_cad=senha_curta");
    exit;
}

// Conecta ao banco
$conn = new PDO("sqlite:banco.db");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Verifica se o email já está cadastrado
$stmt = $conn->prepare("SELECT id_usuario FROM usuarios WHERE email_user = :email_user");
$stmt->bindValue(':email_user', $email_user);
$stmt->execute();

if ($stmt->fetch()) {
    header("Location: login.php?erro_cad=email_uso");
    exit;
}

// Cria o usuário com senha com hash e tipo padrão 'usuario'
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

$insert = $conn->prepare("
    INSERT INTO usuarios (nome_user, email_user, senha, tipo)
    VALUES (:nome_user, :email_user, :senha, 'usuario')
");
$insert->bindValue(':nome_user',  $nome_user);
$insert->bindValue(':email_user', $email_user);
$insert->bindValue(':senha',      $senha_hash);
$insert->execute();

// Redireciona de volta ao login com mensagem de sucesso
header("Location: login.php?ok=cadastro");
exit;
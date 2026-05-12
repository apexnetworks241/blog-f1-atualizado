<?php
// 1. Receber dados do formulário
$nome_user  = trim($_POST['nome_user']  ?? '');
$email_user = trim($_POST['email_user'] ?? '');
$senha      = $_POST['senha'] ?? '';
$tipo       = $_POST['tipo'] ?? 'usuario';

// 2. Validação básica
if (empty($nome_user) || empty($email_user) || empty($senha)) {
    die("Preencha todos os campos.");
}

if (strlen($senha) < 6) {
    die("A senha deve ter pelo menos 6 caracteres.");
}

// 3. Conectar com o banco
$conn = new PDO("sqlite:../banco.db");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 4. Verificar se email já existe
$check = $conn->prepare("SELECT id_usuario FROM usuarios WHERE email_user = :email_user");
$check->bindValue(':email_user', $email_user);
$check->execute();

if ($check->fetch()) {
    die("Este email já está cadastrado.");
}

// 5. Criptografar a senha
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

// 6. Prepared Statement
$stmt = $conn->prepare("
    INSERT INTO usuarios (nome_user, email_user, senha, tipo)
    VALUES (:nome_user, :email_user, :senha, :tipo)
");

$stmt->bindValue(':nome_user',  $nome_user);
$stmt->bindValue(':email_user', $email_user);
$stmt->bindValue(':senha',      $senha_hash); // hash, não texto puro
$stmt->bindValue(':tipo',       $tipo);

// 7. Executar
$stmt->execute();

// 8. Redirecionar
header("Location: listagem-user.php");
exit;
?>
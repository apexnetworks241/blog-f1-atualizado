<?php
session_start();

$pdo = new PDO('sqlite:banco.db');

$email = $_POST['email_user'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE email_user = :email_user";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $email);
$stmt->execute();

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario && $usuario['senha'] === $senha) {

    $_SESSION['id_usuario'] = $usuario['id_usuario'];
    $_SESSION['nome_user'] = $usuario['nome_user'];

    header("Location: index.php");
    exit;

} else {
    echo "Email ou senha incorretos!";
}
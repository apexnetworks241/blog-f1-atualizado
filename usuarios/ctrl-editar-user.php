<?php
// Recebo o id do usuário a ser editado
$id_usuario = $_GET['id_usuario'];

// Conectamos com o banco de dados
// 3. Conectar com o banco

$conn = new PDO("sqlite:../banco.db");

// 4. Prepared Statement

// SELECT usando id como filtro
$sql_dados_usuarios = "
SELECT id_usuario, nome_user, email_user, senha
FROM usuarios
WHERE id_usuario = :id_usuario;
";

$stmt = $conn->prepare($sql_dados_usuarios);
$stmt->bindValue(':id_usuario', $id_usuario);
$stmt->execute();

// Pegamos os dados do usuário
$um_usuario = $stmt->fetch(PDO::FETCH_ASSOC);

$nome_user  = $um_usuario['nome_user'];
$email_user = $um_usuario['email_user'];
$senha      = $um_usuario['senha'];
$id_usuario = $um_usuario['id_usuario'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuário</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>
<body>
    <header>
        <h1>Blog TI 26</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="novo-user.html">Novo usuário</a>
        </nav>
    </header>
    <h2>Editar usuário</h2>
    <form action="ctrl-atualizar-user.php" method="post">
        <label>Nome:</label>
        <input name="nome_user" value="<?= $nome_user ?>">
        <label>Email:</label>
        <input name="email_user" value="<?= $email_user ?>">
        <label>Senha:</label>
        <textarea name="senha"><?= $senha ?></textarea>
        <input type="hidden" name="id_usuario" value="<?= $id_usuario ?>">
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
<?php
require "../../auth.php"; // ou "auth.php" se for na raiz
exigir_login();        // qualquer usuário logado
// exigir_admin();     // só admins (ex: listagem de usuários)
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog F1</title>
    <link rel="stylesheet" href="../../style.css"> 
</head>
<body>
    <header>
        <h1>Blog F1</h1>            
        <nav>
            <a href="/">Home</a>
            <a href="/usuarios.php">Voltar</a>
        </nav>
    </header>

    <h2>Novo Usuário</h2>
    <form  action="/Controller/usuarios/ctrl-novo-user.php" method="post">
        <label>Nome:</label>
        <input type="text" name="nome_user" required>

        <label>Email:</label>
        <input type="email" name="email_user" required>

        <label>Senha:</label>
        <input type="password" name="senha" required>

        <label>Tipo:</label>
        <select name="tipo">
            <option value="usuario">Usuário</option>
            <option value="admin">Admin</option>
        </select>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
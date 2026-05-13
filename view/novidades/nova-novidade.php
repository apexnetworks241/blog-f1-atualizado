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

    <h2>Nova Novidade</h2>

    <form action="ctrl-novo-novidades.php" method="post">
        <label>Título:</label><br>
        <input type="text" name="titulo" required><br><br>

        <label>Conteúdo:</label><br>
        <textarea name="conteudo" rows="6" cols="50" required></textarea><br><br>

        <input type="submit" value="Publicar">
    </form>
</body>
</html>
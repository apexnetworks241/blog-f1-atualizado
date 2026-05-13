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

    <h2>Novo Circuito</h2>
    <form action="/Controller/circuitos/ctrl-novo-circuito.php" method="post">
        <label>Nome:</label>
        <input type="text" name="nome_circuito" required>

        <label>Pais:</label>
        <input type="pais" name="pais_circuito" required>

        <label>Cidade:</label>
        <input type="cidade" name="cidade">

        <label>Extensão:</label>
        <input type="extensao" name="extensao" required>
        
        <label>Temporadas:</label>
        <input type="ano_gp" name="ano_gp" required>
        
        <label>Região:</label>
        <input type="regiao" name="regiao" required>

        <label>Descrição:</label>
        <textarea name="descricao_circuito" rows="4" cols="50"></textarea>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
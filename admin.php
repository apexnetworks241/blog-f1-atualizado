<?php
require "Model/admin_model.php";

require "auth.php"; // ou "auth.php" se for na raiz
exigir_login();        // qualquer usuário logado
// exigir_admin();     // só admins (ex: listagem de usuários)
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $blog_nome ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1><?= $blog_nome ?></h1>
        <nav>
            <a href="index.php">Home</a>
        </nav>
    </header>

    <main>
        <section>
            <h2>Admin</h2>
            <nav>
                <a href="View/novidades/listagem-novidades.php" class="botao-rota">Lista de novidades</a>
                <a href="View/novidades/nova-novidade.php" class="botao-rota">Postar novidade</a>
            </nav>
            <nav>
                <a href="View/equipes/listagem-equipe.php" class="botao-rota">Lista equipe</a>
                <a href="View/equipes/nova-equipe.php" class="botao-rota">Adicionar equipe</a>
            </nav>
            <nav>
                <a href="View/circuitos/listagem-circuito.php" class="botao-rota">Lista circuito</a>
                <a href="View/circuitos/novo-circuito.php" class="botao-rota">Adicionar circuito</a>
            </nav>
            <nav>
                <a href="View/usuarios/listagem-user.php" class="botao-rota">Lista usuarios</a>
                <a href="View/usuarios/novo-user.php" class="botao-rota">Adicionar usuarios</a>
            </nav>
        </section>
    </main>

    <footer>
        <?= $blog_nome ?> - <?= $blog_autor ?> - <?= $blog_email_adm ?>
    </footer>
</body>
</html>
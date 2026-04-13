<?php
require "index_model.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $blog_nome ?></title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>

<body>
    <header>
        <h1><?= $blog_nome ?></h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="equipes/nova-equipe.html">Adicionar Equipe</a>
            <a href="equipes/listagem-equipe.php">Lista de equipes</a>
        </nav>
    </header>

    <main>
        <section>
            <h2>Usuários</h2>

            <?php
            while ($dados_usuarios = $result_set_usuarios->fetch(PDO::FETCH_ASSOC)) {

                $nome_user  = $dados_usuarios['nome_user'];
                $email_user = $dados_usuarios['email_user'];
                $tipo       = $dados_usuarios['tipo'];

                $template = "
                <article>
                    <p><strong>$nome_user</strong></p>
                    <p>Email: $email_user</p>
                    <p>Tipo: $tipo</p>
                </article>
                ";

                echo $template;
            }
            ?>
        </section>
    </main>

    <footer>
        <?= $blog_nome ?> - <?= $blog_autor ?> - <?= $blog_email_adm ?>
    </footer>
</body>
</html>
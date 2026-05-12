<?php
require "novidades_model.php";

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
            <h2>Novidades
            </h2>

            <?php
            while ($dados_novidades = $result_set_novidades->fetch(PDO::FETCH_ASSOC)) {

                $titulo  = $dados_novidades['titulo'];
                $conteudo = $dados_novidades['conteudo'];
                $data_pub = date('d/m/y', strtotime($dados_novidades['data_pub']));

                $template = "
                <article>
                    <p><strong>$titulo</strong></p>
                    <p>conteudo: $conteudo</p>
                    <p>Data: $data_pub</p>
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
<?php
require "equipes_model.php";
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
            <h2>Equipes</h2>

            <?php
            while ($dados_equipes = $result_set_equipes->fetch(PDO::FETCH_ASSOC)) {

                $nome_equipe  = $dados_equipes['nome_equipe'];
                $pais_equipe = $dados_equipes['pais_equipe'];
                $base       = $dados_equipes['base'];
                $anos       = $dados_equipes['anos'];
                $titulos       = $dados_equipes['titulos'];
                $descricao_equipe       = $dados_equipes['descricao_equipe'];

                $template = "
                <article>
                    <p><strong>$nome_equipe</strong></p>
                    <p>Pais: $pais_equipe</p>
                    <p>Base: $base</p>
                    <p>Temporadas: $anos</p>
                    <p>Titulos: $titulos</p>
                    <p>Descrição: $descricao_equipe</p>
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
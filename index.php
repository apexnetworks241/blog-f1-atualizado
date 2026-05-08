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
    <style>
        .grid-baixo {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        @media (max-width: 600px) {
            .grid-baixo {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1><?= $blog_nome ?></h1>
        <nav>
            <a href="usuarios.php">Usuários</a>
            <a href="Novidades.php">Novidades</a>
            <a href="equipes.php">Equipes</a>
            <a href="circuitos.php">Circuitos</a>
        </nav>
    </header>

    <section>

        <!-- SLIDE 1: Novidades (topo, largura total) -->
        <article>
            <h2>Últimas Novidades</h2>
            <?php while ($novidade = $result_top_novidades->fetch(PDO::FETCH_ASSOC)) { ?>
                <div>
                    <h3><?= $novidade['titulo'] ?></h3>
                    <p><strong>Data:</strong> <?= date('d/m/y', strtotime($novidade['data_pub'])) ?></p>
                    <p><?= $novidade['conteudo'] ?></p>
                </div>
                <hr>
            <?php } ?>
        </article>  

        <!-- SLIDES 2 e 3: Equipes e Circuitos lado a lado -->
        <div class="grid-baixo">

            <article>
                <h2>Equipes com mais títulos</h2>
                <?php while ($equipe = $result_top_equipes->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div>
                        <h3><?= $equipe['nome_equipe'] ?></h3>
                        <p><strong>País:</strong> <?= $equipe['pais_equipe'] ?></p>
                        <p><strong>Títulos:</strong> <?= $equipe['titulos'] ?></p>
                    </div>
                    <hr>
                <?php } ?>
            </article>

            <article>
                <h2>Circuitos com mais temporadas</h2>
                <?php while ($circuito = $result_top_circuitos->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div>
                        <h3><?= $circuito['nome_circuito'] ?></h3>
                        <p><strong>País:</strong> <?= $circuito['pais_circuito'] ?></p>
                        <p><strong>Cidade:</strong> <?= $circuito['cidade'] ?></p>
                        <p><strong>Temporadas:</strong> <?= $circuito['ano_gp'] ?></p>
                    </div>
                    <hr>
                <?php } ?>
            </article>

        </div>

    </section>

    <footer>
        <?= $blog_nome ?> - <?= $blog_autor ?> - <?= $blog_email_adm ?>
    </footer>
</body>
</html>
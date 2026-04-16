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
            <a href="usuarios.php">Usuários</a>
            <a href="equipes.php">Equipes</a>
            <a href="circuitos.php">Circuitos</a>
        </nav>
    </header>

    <section>
    <h2>Equipes com mais títulos</h2>
        <?php while ($equipe = $result_top_equipes->fetch(PDO::FETCH_ASSOC)) { ?>
            <div>
                <article>
                <h3><?= $equipe['nome_equipe'] ?></h3>
                    <p><strong>País:</strong> <?= $equipe['pais_equipe'] ?></p>
                    <p><strong>Títulos:</strong> <?= $equipe['titulos'] ?></p>
                </article>
        </div>
        <?php } ?>
        <hr>
    <h2>Circuitos com mais temporadas</h2>
        <?php while ($circuito = $result_top_circuitos->fetch(PDO::FETCH_ASSOC)) { ?>
            <div>
                <article>
                <h3><?= $circuito['nome_circuito'] ?></h3>
                    <p><strong>País:</strong> <?= $circuito['pais_circuito'] ?></p>
                    <p><strong>Cidade:</strong> <?= $circuito['cidade'] ?></p>
                    <p><strong>Temporadas:</strong> <?= $circuito['ano_gp'] ?></p>
                </article>
            </div>
        <?php } ?>
    </section>
    <footer>
        <?= $blog_nome ?> - <?= $blog_autor ?> - <?= $blog_email_adm ?>
    </footer>
</body>
</html>
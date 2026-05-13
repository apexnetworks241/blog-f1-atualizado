<?php
require "auth.php";
exigir_login();
require "Model/index_model.php";
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
            <a href="Novidades.php">Novidades</a>
            <a href="equipes.php">Equipes</a>
            <a href="circuitos.php">Circuitos</a>
            <?php if (is_admin()): ?>
            <a href="admin.php" style="color: var(--f1-red);">⚙ Admin</a>
            <?php endif; ?>
            <a href="logout.php" style="margin-left:auto; color: var(--f1-muted);">Sair (<?= htmlspecialchars($_SESSION['nome_user']) ?>)</a>
        </nav>
    </header>

    <section>

        <article class="slider-wrap">
            <div class="slider-header">
                <h2>Últimas Novidades</h2>
            </div>

            <div class="slider-body">
                <button class="nav-btn" id="prev">&#8249;</button>

                <div class="slides-container">
                    <?php $first = true; while ($novidade = $result_top_novidades->fetch(PDO::FETCH_ASSOC)): ?>
                        <div class="slide <?= $first ? 'active' : '' ?>">
                            <p class="news-title"><?= htmlspecialchars($novidade['titulo']) ?></p>
                            <p class="news-date"><span>Data:</span> <?= date('d/m/y', strtotime($novidade['data_pub'])) ?></p>
                            <p class="news-content"><?= htmlspecialchars($novidade['conteudo']) ?></p>
                        </div>
                    <?php $first = false; endwhile; ?>
                </div>

                <button class="nav-btn" id="next">&#8250;</button>
            </div>

            <div class="slider-footer">
                <div class="dots" id="dots"></div>
                <p class="counter" id="counter"></p>
            </div>
        </article>

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

    <script src="script.js"></script>
</body>
</html>
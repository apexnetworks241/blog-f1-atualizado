<?php
require "Model/circuitos_model.php";

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
            <h2>Circuitos
            </h2>

            <?php
            while ($dados_circuitos = $result_set_circuitos->fetch(PDO::FETCH_ASSOC)) {

                $nome_circuito  = $dados_circuitos['nome_circuito'];
                $pais_circuito = $dados_circuitos['pais_circuito'];
                $cidade = $dados_circuitos['cidade'];
                $extensao = $dados_circuitos['extensao'];
                $ano_gp = $dados_circuitos['ano_gp'];
                $regiao = $dados_circuitos['regiao'];
                $descricao_circuito = $dados_circuitos['descricao_circuito'];

                $template = "
                <article>
                    <p><strong>$nome_circuito</strong></p>
                    <p>Pais: $pais_circuito</p>
                    <p>Cidade: $cidade</p>
                    <p>Tamanho: $extensao</p>
                    <p>Temporadas: $ano_gp</p>
                    <p>Regiao: $regiao</p>
                    <p>Descrição: $descricao_circuito</p>
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
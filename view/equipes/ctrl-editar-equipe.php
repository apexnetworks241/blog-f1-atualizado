<?php
$id_equipe = $_GET['id_equipe'];

$conn = new PDO("sqlite:../../banco.db");

$sql_dados_equipes = "
SELECT id_equipe, nome_equipe, pais_equipe, base, anos, titulos, descricao_equipe
FROM equipes
WHERE id_equipe = :id_equipe;
";

$stmt = $conn->prepare($sql_dados_equipes);
$stmt->bindValue(':id_equipe', $id_equipe);
$stmt->execute();

$uma_equipe = $stmt->fetch(PDO::FETCH_ASSOC);

$nome_equipe     = $uma_equipe['nome_equipe'];
$pais_equipe     = $uma_equipe['pais_equipe'];
$base            = $uma_equipe['base'];
$anos            = $uma_equipe['anos'];
$titulos         = $uma_equipe['titulos'];
$descricao_equipe = $uma_equipe['descricao_equipe'];
$id_equipe       = $uma_equipe['id_equipe'];

require "../../auth.php";
exigir_login();
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
            <a href="/View/equipes/listagem-equipe.php">Voltar</a>
        </nav>
    </header>
    <h2>Editar equipe</h2>
    <form action="/Controller/equipes/ctrl-atualizar-equipe.php" method="post">

        <label>Nome:</label>
        <input type="text" name="nome_equipe" required value="<?= htmlspecialchars($nome_equipe) ?>">

        <label>Pais:</label>
        <input type="text" name="pais_equipe" required value="<?= htmlspecialchars($pais_equipe) ?>">

        <label>Base:</label>
        <input type="text" name="base" required value="<?= htmlspecialchars($base) ?>">

        <label>Temporada:</label>
        <input type="number" name="anos" required value="<?= htmlspecialchars($anos) ?>">

        <label>Titulos:</label>
        <input type="number" name="titulos" required value="<?= htmlspecialchars($titulos) ?>">

        <label>Descrição:</label>
        <textarea name="descricao_equipe" rows="4" cols="50"><?= htmlspecialchars($descricao_equipe) ?></textarea>

        <input type="hidden" name="id_equipe" value="<?= htmlspecialchars($id_equipe) ?>">

        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
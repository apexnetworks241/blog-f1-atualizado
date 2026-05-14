<?php
$id_circuito = $_GET['id_circuito'];

$conn = new PDO("sqlite:../../banco.db");

$sql_dados_circuito = "
SELECT id_circuito, nome_circuito, pais_circuito, cidade, extensao, ano_gp, regiao, descricao_circuito
FROM circuitos
WHERE id_circuito = :id_circuito;
";

$stmt = $conn->prepare($sql_dados_circuito);
$stmt->bindValue(':id_circuito', $id_circuito);
$stmt->execute();

$um_circuito = $stmt->fetch(PDO::FETCH_ASSOC);

$nome_circuito      = $um_circuito['nome_circuito'];
$pais_circuito      = $um_circuito['pais_circuito'];
$cidade             = $um_circuito['cidade'];
$extensao           = $um_circuito['extensao'];
$ano_gp             = $um_circuito['ano_gp'];
$regiao             = $um_circuito['regiao'];
$descricao_circuito = $um_circuito['descricao_circuito'];
$id_circuito        = $um_circuito['id_circuito'];

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
            <a href="/View/circuitos/listagem-circuito.php">Voltar</a>
        </nav>
    </header>
    <h2>Editar circuito</h2>
    <form action="/Controller/circuitos/ctrl-atualizar-circuito.php" method="post">

        <label>Nome:</label>
        <input type="text" name="nome_circuito" required value="<?= htmlspecialchars($nome_circuito) ?>">

        <label>Pais:</label>
        <input type="text" name="pais_circuito" required value="<?= htmlspecialchars($pais_circuito) ?>">

        <label>Cidade:</label>
        <input type="text" name="cidade" required value="<?= htmlspecialchars($cidade) ?>">

        <label>Tamanho:</label>
        <input type="text" name="extensao" required value="<?= htmlspecialchars($extensao) ?>">

        <label>Temporadas:</label>
        <input type="number" name="ano_gp" required value="<?= htmlspecialchars($ano_gp) ?>">

        <label>Regiao:</label>
        <input type="text" name="regiao" required value="<?= htmlspecialchars($regiao) ?>">

        <label>Descrição:</label>
        <textarea name="descricao_circuito" rows="4" cols="50"><?= htmlspecialchars($descricao_circuito) ?></textarea>

        <input type="hidden" name="id_circuito" value="<?= htmlspecialchars($id_circuito) ?>">

        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
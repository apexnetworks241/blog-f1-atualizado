<?php
// Recebo o id do usuário a ser editado
$id_equipe = $_GET['id_equipe'];

// Conectamos com o banco de dados
// 3. Conectar com o banco

$conn = new PDO("sqlite:../banco.db");

// 4. Prepared Statement

// SELECT usando id como filtro
$sql_dados_equipes = "
SELECT id_equipe, nome_equipe, pais_equipe, base, anos, titulos, descricao_equipe, status
FROM equipes
WHERE id_equipe = :id_equipe;
";

$stmt = $conn->prepare($sql_dados_equipes);
$stmt->bindValue(':id_equipe', $id_equipe);
$stmt->execute();

// Pegamos os dados do usuário
$uma_equipe = $stmt->fetch(PDO::FETCH_ASSOC);

$nome_equipe  = $uma_equipe['nome_equipe'];
$pais_equipe = $uma_equipe['pais_equipe'];
$base = $uma_equipe['base'];
$anos = $uma_equipe['anos'];
$titulos = $uma_equipe['titulos'];
$descricao_equipe = $uma_equipe['descricao_equipe'];
$status = $uma_equipe['status'];
$id_equipe = $uma_equipe['id_equipe'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar equipe</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>
<body>
    <header>
        <h1>Blog TI 26</h1>
        <nav>
            <a href="/">Home</a>
            <a href="nova-equipe.html">Adicionar equipe</a>
        </nav>
    </header>
    <h2>Editar equipe</h2>
    <form action="ctrl-nova-equpe.php" method="post">
        <label>Nome:</label>
        <input type="text" name="nome_equipe" required value=<?=$nome_equipe?>>

        <label>Pais:</label>
        <input type="pais" name="pais_equipe" required value=<?=$pais_equipe?>>

        <label>Base:</label>
        <input type="base" name="base" required value=<?=$base?>>
        
        <label>Temporada:</label>
        <input type="anos" name="anos" required value=<?=$anos?>>
        
        <label>Titulos:</label>
        <input type="titulos" name="titulos" required value=<?=$titulos?>>

        <label>Descrição:</label>
        <textarea name="descricao_equipe" rows="4" cols="50">
            <?=$descricao_equipe?>
        </textarea>
        
        <label>Status:</label>
        <select name="status">
            <option value="ativada">Ativa</option>
            <option value="Desativada">Desativada</option>
        </select>

        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
<?php
// Recebo o id do usuário a ser editado
$id_circuito = $_GET['id_circuito'];

// Conectamos com o banco de dados
// 3. Conectar com o banco

$conn = new PDO("sqlite:../banco.db");

// 4. Prepared Statement

// SELECT usando id como filtro
$sql_dados_circuito = "
SELECT id_circuito, nome_circuito, pais_circuito, cidade, extensao, ano_gp, regiao, descricao_circuito
FROM circuitos
WHERE id_circuito = :id_circuito;
";

$stmt = $conn->prepare($sql_dados_equipes);
$stmt->bindValue(':id_circuito', $id_circuito);
$stmt->execute();

// Pegamos os dados do usuário
$um_circuito = $stmt->fetch(PDO::FETCH_ASSOC);

$nome_circuito  = $um_circuito['nome_circuito'];
$pais_circuito = $um_circuito['pais_circuito'];
$cidade = $um_circuito['cidade'];
$extensao = $um_circuito['extensao'];
$ano_gp = $um_circuito['ano_gp'];
$regiao = $um_circuito['regiao'];
$descricao_circuito = $um_circuito['descricao_circuito'];
$id_circuito = $um_circuito['id_circuito'];
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
        <input type="nome" name="nome_equipe" required value=<?=$nome_circuito?>>

        <label>Pais:</label>
        <input type="pais" name="pais_equipe" required value=<?=$pais_circuito?>>

        <label>Cidade:</label>
        <input type="cidade" name="base" required value=<?=$cidade?>>
        
        <label>Tamanho:</label>
        <input type="extensao" name="extensao" required value=<?=$extensao?>>
        
        <label>Temporadas:</label>
        <input type="ano" name="ano" required value=<?=$ano_gp?>>

        <label>Regiao:</label>
        <input type="regiao" name="regiao" required value=<?=$regiao?>>

        <label>Descrição:</label>
        <textarea name="descricao_circuito" rows="4" cols="50">
            <?=$descricao_circuito?>
</textarea>

        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
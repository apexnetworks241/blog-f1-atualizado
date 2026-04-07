<?php
// 1. Receber dados do formulário

$nome_circuito  = $_POST['nome_circuito'];
$pais_circuito = $_POST['pais_circuito'];
$cidade = $_POST['cidade'];
$extensao = $_POST['extensao'];
$ano_gp = $_POST['ano_gp'];
$regiao = $_POST['regiao'];
$descricao_circuito = $_POST['descricao_circuito'];
$id_circuito = $_POST['id_circuito'];

// 2. Montar instrução SQL (UPDATE)

$sql = "
UPDATE circuitos
SET nome_circuito  = :nome_circuito,
    pais_circuito = :pais_circuito,
    cidade = :cidade,
    extensao = :extensao,
    ano_gp = :ano_gp,
    regiao = :regiao,
    descricao_circuito = :descricao_circuito
WHERE id_circuito = :id_circuito;
";

// 3. Conectar com o banco

$conn = new PDO("sqlite:../banco.db");

// 4. Prepared Statement

$stmt = $conn->prepare($sql);

// 5. Passamos os valores antes de executar o comando

$stmt->bindValue(':nome_equipe',  $nome_equipe);
$stmt->bindValue(':pais_equipe', $pais_equipe);
$stmt->bindValue(':base', $base);
$stmt->bindValue(':anos', $anos);
$stmt->bindValue(':titulos', $titulos);
$stmt->bindValue(':status', $status);
$stmt->bindValue(':descricao_equipe', $descricao_equipe);
$stmt->bindValue(':id_equipe', $id_equipe);

// 6. Executamos o comando

$stmt->execute();

// 7. Mostramos a listagem com o usuário atualizado

require "listagem-equipe.php";
?><?php
// 1. Receber dados do formulário

$nome_equipe  = $_POST['nome_equipe'];
$pais_equipe = $_POST['pais_equipe'];
$base = $_POST['base'];
$anos = $_POST['anos'];
$titulos = $_POST['titulos'];
$status = $_POST['status'] ?? 'ativa'; // valor padrão caso não enviado
$descricao_equipe = $_POST['descricao_equipe'];
$id_equipe = $_POST['id_equipe'];

// 2. Montar instrução SQL (UPDATE)

$sql = "
UPDATE equipes
SET nome_equipe  = :nome_equipe,
    pais_equipe = :pais_equipe,
    base = :base,
    anos = :anos,
    titulos = :titulos,
    descricao_equipe = :descricao_equipe,
    status = :status
    
WHERE id_equipe = :id_equipe;
";

// 3. Conectar com o banco

$conn = new PDO("sqlite:../banco.db");

// 4. Prepared Statement

$stmt = $conn->prepare($sql);

// 5. Passamos os valores antes de executar o comando

$stmt->bindValue(':nome_equipe',  $nome_equipe);
$stmt->bindValue(':pais_equipe', $pais_equipe);
$stmt->bindValue(':base', $base);
$stmt->bindValue(':anos', $anos);
$stmt->bindValue(':titulos', $titulos);
$stmt->bindValue(':status', $status);
$stmt->bindValue(':descricao_equipe', $descricao_equipe);
$stmt->bindValue(':id_equipe', $id_equipe);

// 6. Executamos o comando

$stmt->execute();

// 7. Mostramos a listagem com o usuário atualizado

require "listagem-equipe.php";
?>
<?php
// 1. Receber dados do formulário

$nome_circuito  = $_POST['nome_circuito'];
$pais_circuito = $_POST['pais_circuito'];
$cidade = $_POST['cidade'];
$extensao = $_POST['extensao'];
$ano_gp = $_POST['ano_gp'];
$regiao = $_POST['regiao'];
$descricao_circuito = $_POST['descricao_circuito'];

// 2. Montar instrução SQL (INSERT)

$sql = "
INSERT INTO circuitos (nome_circuito, pais_circuito, cidade, extensao, ano_gp, regiao, descricao_circuito)
VALUES (:nome_circuito, :pais_circuito, :cidade, :extensao, :ano_gp, :regiao, :descricao_circuito);
";

// 3. Conectar com o banco

$conn = new PDO("sqlite:../banco.db");

// 4. Prepared Statement

$stmt = $conn->prepare($sql);

// 5. Passamos os valores antes de executar o comando

$stmt->bindValue(':nome_circuito',  $nome_circuito);
$stmt->bindValue(':pais_circuito', $pais_circuito);
$stmt->bindValue(':cidade', $cidade);
$stmt->bindValue(':extensao', $extensao);
$stmt->bindValue(':ano_gp', $ano_gp);
$stmt->bindValue(':regiao', $regiao);
$stmt->bindValue(':descricao_circuito', $descricao_circuito);

// 6. Executamos o comando

$stmt->execute();

// 7. Pegamos o valor do ID do novo registro

$id = $conn->lastInsertId();

// 8. Redirecionamos para a listagem

require "listagem-circuito.php";
?>
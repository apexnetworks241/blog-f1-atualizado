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

$stmt->bindValue(':nome_circuito',  $nome_circuito);
$stmt->bindValue(':pais_circuito', $pais_circuito);
$stmt->bindValue(':cidade', $cidade);
$stmt->bindValue(':extensao', $extensao);
$stmt->bindValue(':ano_gp', $ano_gp);
$stmt->bindValue(':regiao', $regiao);
$stmt->bindValue(':descricao_circuito', $descricao_circuito);
$stmt->bindValue(':id_circuito', $id_circuito);

// 6. Executamos o comando

$stmt->execute();

// 7. Mostramos a listagem com o usuário atualizado

require "listagem-circuito.php";
?>
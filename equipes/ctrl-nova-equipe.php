<?php
// 1. Receber dados do formulário

$nome_equipe  = $_POST['nome_equipe'];
$pais_equipe = $_POST['pais_equipe'];
$base = $_POST['base'];
$anos = $_POST['anos'];
$titulos = $_POST['titulos'];
$status = $_POST['status'] ?? 'ativa'; // valor padrão caso não enviado
$descricao_equipe = $_POST['descricao_equipe'];

// 2. Montar instrução SQL (INSERT)

$sql = "
INSERT INTO equipes (nome_equipe, pais_equipe, base, anos, titulos, status, descricao_equipe)
VALUES (:nome_equipe, :pais_equipe, :base, :anos, :titulos, :status, :descricao_equipe);
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

// 6. Executamos o comando

$stmt->execute();

// 7. Pegamos o valor do ID do novo registro

$id = $conn->lastInsertId();

// 8. Redirecionamos para a listagem

require "listagem-equipe.php";
?>
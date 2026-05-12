<?php
$id_circuito = $_GET['id_circuito'];

// Conectamos com o banco de dados
// 3. Conectar com o banco

$conn = new PDO("sqlite:../banco.db");

// 4. Prepared Statement
$stmt = $conn->prepare("
DELETE FROM circuitos
WHERE id_circuito = :id_circuito
");

// Passamos os valores antes de executar o comando
$stmt->bindValue(':id_circuito', $id_circuito);

// Apagamos o registro
$stmt->execute(); # aqui o DELETE é enviado ao banco

// Mostramos a listagem de posts para o usuário
// conferir que o post não está mais lá

require "listagem-circuito.php";
?>
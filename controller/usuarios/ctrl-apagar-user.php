<?php
$id_usuario = $_GET['id_usuario'];

// Conectamos com o banco de dados
// 3. Conectar com o banco

$conn = new PDO("sqlite:../banco.db");

// 4. Prepared Statement



$sql = "
DELETE FROM usuarios
WHERE id_usuario = :id_usuario
";

$stmt = $conn->prepare($sql);

// Passamos os valores antes de executar o comando
$stmt->bindValue(':id_usuario', $id_usuario);

// Apagamos o registro
$stmt->execute(); # aqui o DELETE é enviado ao banco

// Mostramos a listagem de posts para o usuário
// conferir que o post não está mais lá

require "listagem-user.php";
?>
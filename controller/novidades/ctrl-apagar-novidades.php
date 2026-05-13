<?php
$id_novidades = $_GET['id_novidades'];

// Conectamos com o banco de dados
// 3. Conectar com o banco

$conn = new PDO("sqlite:../../banco.db");

// 4. Prepared Statement

$sql = "
DELETE FROM novidades
WHERE id_novidades = :id_novidades
";

$stmt = $conn->prepare($sql);

// Passamos os valores antes de executar o comando
$stmt->bindValue(':id_novidades', $id_novidades);

// Apagamos o registro
$stmt->execute(); # aqui o DELETE é enviado ao banco

// Mostramos a listagem de posts para o usuário
// conferir que o post não está mais lá
ob_start(); // adiciona essa linha no topo
// ... resto do código ...
header("Location: /View/novidades/listagem-novidades.php");

exit;
?>
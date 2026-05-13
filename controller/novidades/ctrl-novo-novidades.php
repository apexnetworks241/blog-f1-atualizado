<?php
// 1. Receber dados do formulário

$titulo  = $_POST['titulo'];
$conteudo = $_POST['conteudo'];

$data_pub = date('Y-m-d');
//$data_pub      = $_POST['data_pub'];
// 2. Montar instrução SQL (INSERT)

$sql = "
INSERT INTO novidades (titulo, conteudo, data_pub)
VALUES (:titulo, :conteudo, :data_pub);
";

// 3. Conectar com o banco

$conn = new PDO("sqlite:../../banco.db");

// 4. Prepared Statement

$stmt = $conn->prepare($sql);

// 5. Passamos os valores antes de executar o comando

$stmt->bindValue(':titulo', $titulo);
$stmt->bindValue(':conteudo', $conteudo);
$stmt->bindValue(':data_pub', $data_pub);

// 6. Executamos o comando

$stmt->execute();

// 7. Pegamos o valor do ID do novo registro

$id = $conn->lastInsertId();

// 8. Redirecionamos para a listagem
ob_start(); // adiciona essa linha no topo
// ... resto do código ...
header("Location: /View/novidades/listagem-novidades.php");

exit;
?>
<?php
// 1. Receber dados do formulário

$titulo  = $_POST['titulo'];
$conteudo = $_POST['conteudo'];
$data_pub = $_POST['data_pub'];
$id_novidades = $_POST['id_novidades'];

// 2. Montar instrução SQL (UPDATE)

$sql = "
UPDATE novidades
SET titulo  = :titulo,
    conteudo = :conteudo,
    data_pub = :data_pub    
WHERE id_novidades = :id_novidades;
";

// 3. Conectar com o banco

$conn = new PDO("sqlite:../banco.db");

// 4. Prepared Statement

$stmt = $conn->prepare($sql);

// 5. Passamos os valores antes de executar o comando

$stmt->bindValue(':titulo',  $titulo);
$stmt->bindValue(':conteudo', $conteudo);
$stmt->bindValue(':data_pub', $data_pub);
$stmt->bindValue(':id_novidades', $id_novidades);

// 6. Executamos o comando

$stmt->execute();

// 7. Mostramos a listagem com o usuário atualizado

require "listagem-novidades.php";
?>
<?php
$id_novidades = $_GET['id_novidades'];

$conn = new PDO("sqlite:../../banco.db");

$sql_dados_equipes = "
SELECT id_novidades, titulo, conteudo, data_pub
FROM novidades
WHERE id_novidades = :id_novidades;
";

$stmt = $conn->prepare($sql_dados_equipes);
$stmt->bindValue(':id_novidades', $id_novidades);
$stmt->execute();

$uma_novidade = $stmt->fetch(PDO::FETCH_ASSOC);

$titulo       = $uma_novidade['titulo'];
$conteudo     = $uma_novidade['conteudo'];
$data_pub     = $uma_novidade['data_pub'];
$id_novidades = $uma_novidade['id_novidades'];

require "../../auth.php";
exigir_login();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog F1</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <header>
        <h1>Blog F1</h1>
        <nav>
            <a href="/">Home</a>
            <a href="/view/novidades/listagem-novidades.php">Voltar</a>
        </nav>
    </header>
    <h2>Editar Novidade</h2>
    <form action="/Controller/novidades/ctrl-atualizar-novidades.php" method="post">

        <label>Titulo:</label>
        <input type="text" name="titulo" required value="<?= htmlspecialchars($titulo) ?>">

        <label>Data:</label>
        <input type="date" name="data_pub" required value="<?= htmlspecialchars($data_pub) ?>">

        <label>Conteudo:</label>
        <textarea name="conteudo" rows="4" cols="50"><?= htmlspecialchars($conteudo) ?></textarea>

        <input type="hidden" name="id_novidades" value="<?= htmlspecialchars($id_novidades) ?>">

        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
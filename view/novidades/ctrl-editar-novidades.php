<?php
// Recebo o id do usuário a ser editado
$id_novidades = $_GET['id_novidades'];

// Conectamos com o banco de dados
// 3. Conectar com o banco

$conn = new PDO("sqlite:../../banco.db");

// 4. Prepared Statement

// SELECT usando id como filtro
$sql_dados_equipes = "
SELECT id_novidades, titulo, conteudo, data_pub
FROM novidades
WHERE id_novidades = :id_novidades;
";

$stmt = $conn->prepare($sql_dados_equipes);
$stmt->bindValue(':id_novidades', $id_novidades);
$stmt->execute();

// Pegamos os dados do usuário
$uma_novidade = $stmt->fetch(PDO::FETCH_ASSOC);

$titulo  = $uma_novidade['titulo'];
$conteudo = $uma_novidade['conteudo'];
$data_pub = $uma_novidade['data_pub'];
$id_novidades = $uma_novidade['id_novidades'];

require "../../auth.php"; // ou "auth.php" se for na raiz
exigir_login();        // qualquer usuário logado
// exigir_admin();     // só admins (ex: listagem de usuários)
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
            <a href="/admin.php">Voltar</a>
        </nav>
    </header>
    <h2>Editar Novidade</h2>
    <form action="/Controller/novidades/ctrl-atualizar-novidades.php" method="post">
        <label>Titulo:</label>
        <input type="text" name="titulo" required value=<?=$titulo?>>

        <label>Data:</label>
        <input type="date" name="data_pub" required value=<?=$data_pub?>>

        <label>conteudo:</label>
        <textarea name="conteudo" rows="4" cols="50">
<?=$conteudo?>
        </textarea>
        <input type="hidden" name="id_novidades" value=<?=$id_novidades?>> 
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
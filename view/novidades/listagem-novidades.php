<?php
$conn = new PDO("sqlite:../../banco.db");

$sql_dados_novidades = "
SELECT id_novidades, titulo, conteudo, data_pub
FROM novidades
ORDER BY id_novidades DESC;
";

$result_set_novidades = $conn->query($sql_dados_novidades);

require "../../auth.php"; // ou "auth.php" se for na raiz
exigir_login();        // qualquer usuário logado
// exigir_admin();     // só admins (ex: listagem de usuários)
?>

<!DOCTYPE html>
<html>
<head>
    <TITLe>Blog F1</TITLe>
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <header>
        <h1>Blog F1</h1>
            <nav>
                <a href="/">Home</a>
                <a href="/usuarios.php">Voltar</a>
            </nav>
    </header>
    <h2>Lista de novidades</h2>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>conteudo</th>
                <th>Data</th>
                <th>Comandos</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($uma_novidade = $result_set_novidades->fetch(PDO::FETCH_ASSOC)) {
                $titulo  = $uma_novidade['titulo'];
                $conteudo = $uma_novidade['conteudo'];
                $data_pub = date('d/m/y', strtotime($uma_novidade['data_pub']));
                $id_novidades = $uma_novidade['id_novidades'];

                $linha_com_novidade = "
                <tr>
                    <td>$titulo</td>
                    <td>$conteudo</td>
                    <td>$data_pub</td>
                    <td>
                    <a href='ctrl-apagar-novidades.php?id_novidades=$id_novidades'>🗑️</a>
                    <a href='ctrl-editar-novidades.php?id_novidades=$id_novidades'>✏️</a>
                    </td>
                </tr>
                ";

                echo $linha_com_novidade;
            }
            ?>
        </tbody>
    </table>
</body>
</html>
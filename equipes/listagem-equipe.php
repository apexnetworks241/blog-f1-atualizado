<?php
// Conectamos com o banco de dados
// 3. Conectar com o banco

// 3. Conectar com o banco

$conn = new PDO("sqlite:../banco.db");

$sql_dados_equipes = "
SELECT id_equipe, nome_equipe, pais_equipe, base, anos, titulos, status, descricao_equipe
FROM equipes
ORDER BY id_equipe DESC;
";

$result_set_equipes = $conn->query($sql_dados_equipes);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>
<body>
    <header>
        <h1>Listagem de usuários</h1>
            <nav>
                <a href="/">Home</a>
                <a href="/equipes.php">Equipes</a>
            </nav>
    </header>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Pais</th>
                <th>Base</th>
                <th>Temporadas</th>
                <th>Titulos</th>
                <th>Status</th>
                <th>Descrição</th>
                <th>Comandos</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($uma_equipe = $result_set_equipes->fetch(PDO::FETCH_ASSOC)) {
                $nome_equipe  = $uma_equipe['nome_equipe'];
                $pais_equipe = $uma_equipe['pais_equipe'];
                $base = $uma_equipe['base'];
                $anos = $uma_equipe['anos'];
                $titulos = $uma_equipe['titulos'];
                $descricao_equipe = $uma_equipe['descricao_equipe'];
                $status = $uma_equipe['status'];
                $id_equipe = $uma_equipe['id_equipe'];

                $linha_com_equipe = "
                <tr>
                    <td>$nome_equipe</td>
                    <td>$pais_equipe</td>
                    <td>$base</td>
                    <td>$anos</td>
                    <td>$titulos</td>
                    <td>$status</td>
                    <td>$descricao_equipe</td>
                    <td>
                    <a href='ctrl-apagar-equipe.php?id_equipe=$id_equipe'>🗑️</a>
                    <a href='ctrl-editar-equipe.php?id_equipe=$id_equipe'>✏️</a>
                    </td>
                </tr>
                ";

                echo $linha_com_equipe;
            }
            ?>
        </tbody>
    </table>
</body>
</html>
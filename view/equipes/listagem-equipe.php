<?php
// Conectamos com o banco de dados
// 3. Conectar com o banco

// 3. Conectar com o banco

$conn = new PDO("sqlite:../../banco.db");

$sql_dados_equipes = "
SELECT id_equipe, nome_equipe, pais_equipe, base, anos, titulos, descricao_equipe
FROM equipes
ORDER BY id_equipe DESC;
";

$result_set_equipes = $conn->query($sql_dados_equipes);

require "../../auth.php"; // ou "auth.php" se for na raiz
exigir_login();        // qualquer usuário logado
// exigir_admin();     // só admins (ex: listagem de usuários)
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blog F1</title>
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
    <h2>Lista de equipes</h2>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Pais</th>
                <th>Base</th>
                <th>Temporadas</th>
                <th>Titulos</th>
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
                $id_equipe = $uma_equipe['id_equipe'];

                $linha_com_equipe = "
                <tr>
                    <td>$nome_equipe</td>
                    <td>$pais_equipe</td>
                    <td>$base</td>
                    <td>$anos</td>
                    <td>$titulos</td>
                    <td>$descricao_equipe</td>
                    <td>
                    <a href='/Controller/equipes/ctrl-apagar-equipe.php?id_equipe=$id_equipe'>🗑️</a>
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
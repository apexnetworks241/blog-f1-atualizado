<?php
// Conectamos com o banco de dados
// 3. Conectar com o banco

// 3. Conectar com o banco

$conn = new PDO("sqlite:../../banco.db");

$sql_dados_circuitos = "
SELECT id_circuito, nome_circuito, pais_circuito, cidade, extensao, ano_gp, regiao, descricao_circuito
FROM circuitos
ORDER BY id_circuito DESC;
";

$result_set_circuitos = $conn->query($sql_dados_circuitos);

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
    <h2>Lista de cirrcuitos</h2>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Pais</th>
                <th>Cidade</th>
                <th>Extensão</th>
                <th>Temporadas</th>
                <th>Região</th>
                <th>Descrição</th>
                <th>Comandos</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($um_circuito = $result_set_circuitos->fetch(PDO::FETCH_ASSOC)) {
                
                $nome_circuito  = $um_circuito['nome_circuito'];
                $pais_circuito = $um_circuito['pais_circuito'];
                $cidade = $um_circuito['cidade'];
                $extensao = $um_circuito['extensao'];
                $ano_gp = $um_circuito['ano_gp'];
                $regiao = $um_circuito['regiao'];
                $descricao_circuito = $um_circuito['descricao_circuito'];
                $id_circuito = $um_circuito['id_circuito'];
                                
                $linha_com_circuito = "
                <tr>
                    <td>$nome_circuito</td>
                    <td>$pais_circuito</td>
                    <td>$cidade</td>
                    <td>$extensao</td>
                    <td>$ano_gp</td>
                    <td>$regiao</td>
                    <td>$descricao_circuito</td>
                    <td>
                    <a href='/Controller/circuitos/ctrl-apagar-circuito.php?id_circuito=$id_circuito'>🗑️</a>
                    <a href='ctrl-editar-circuito.php?id_circuito=$id_circuito'>✏️</a>
                    </td>
                </tr>
                ";

                echo $linha_com_circuito;
            }
            ?>
        </tbody>
    </table>
</body>
</html>
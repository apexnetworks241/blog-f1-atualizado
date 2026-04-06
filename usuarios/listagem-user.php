<?php
// Conectamos com o banco de dados
// 3. Conectar com o banco

// 3. Conectar com o banco

$conn = new PDO("sqlite:../banco.db");

$sql_dados_usuarios = "
SELECT id_usuario, nome_user, email_user, senha, tipo
FROM usuarios
ORDER BY id_usuario DESC;
";

$result_set_usuarios = $conn->query($sql_dados_usuarios);
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
                <a href="novo-user.html">Novo usuario</a>
            </nav>
    </header>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Senha</th>
                <th>Tipo</th>
                <th>Comandos</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($um_usuario = $result_set_usuarios->fetch(PDO::FETCH_ASSOC)) {
                $nome_user  = $um_usuario['nome_user'];
                $email_user = $um_usuario['email_user'];
                $senha      = $um_usuario['senha'];
                $tipo       = $um_usuario['tipo'];
                $id_usuario = $um_usuario['id_usuario'];

                $linha_com_user = "
                <tr>
                    <td>$nome_user</td>
                    <td>$email_user</td>
                    <td>$senha</td>
                    <td>$tipo</td>
                    <td>
                        <a href='ctrl-apagar-user.php?id_usuario=$id_usuario'>🗑️</a>
                        <a href='ctrl-editar-user.php?id_usuario=$id_usuario'>✏️</a>
                    </td>
                </tr>
                ";

                echo $linha_com_user;
            }
            ?>
        </tbody>
    </table>
</body>
</html>
<?php
// Conectamos com o banco de dados
// 3. Conectar com o banco

// 3. Conectar com o banco

$conn = new PDO("sqlite:../../banco.db");

$sql_dados_usuarios = "
SELECT id_usuario, nome_user, email_user, senha, tipo
FROM usuarios
ORDER BY id_usuario DESC;
";

$result_set_usuarios = $conn->query($sql_dados_usuarios);

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
                <a href="/admin.php">Voltar</a>
            </nav>
    </header>
    <h2>Lista de usuarios</h2>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Comandos</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($um_usuario = $result_set_usuarios->fetch(PDO::FETCH_ASSOC)) {
                $nome_user  = $um_usuario['nome_user'];
                $email_user = $um_usuario['email_user'];
                $id_usuario = $um_usuario['id_usuario'];

                $linha_com_user = "
                <tr>
                    <td>$nome_user</td>
                    <td>$email_user</td>
                    <td>
                        <a href='/Controller/usuarios/ctrl-apagar-user.php?id_usuario=$id_usuario'>🗑️</a>
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
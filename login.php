<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Blog F1 26</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-wrap">
        <div class="login-box">
            <h2>Entrar</h2>
            <p>Blog F1 26 — acesso restrito</p>

            <?php if (!empty($_GET['erro'])): ?>
                <div class="erro">
                    <?php
                    $erros = [
                        'credenciais' => 'Email ou senha incorretos.',
                        'acesso'      => 'Faça login para acessar esta página.',
                    ];
                    echo $erros[$_GET['erro']] ?? 'Erro desconhecido.';
                    ?>
                </div>
            <?php endif; ?>

            <form action="ctrl-login.php" method="post">
                <label>Email</label>
                <input type="email" name="email_user" required autofocus>

                <label>Senha</label>
                <input type="password" name="senha" required>

                <input type="submit" value="Entrar" style="width:100%; margin-top:0.5rem;">
            </form>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Blog F1 26</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .login-wrap {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        .login-box {
            background: var(--f1-dark);
            border: 1px solid var(--f1-border);
            border-top: 4px solid var(--f1-red);
            border-radius: var(--radius);
            padding: 2.5rem 2rem;
            width: 100%;
            max-width: 420px;
        }
        .login-box h2 {
            margin: 0 0 0.25rem;
            font-size: 1.6rem;
        }
        .login-box p {
            color: var(--f1-muted);
            font-size: 0.88rem;
            margin-bottom: 2rem;
        }
        .login-box form {
            border: none;
            padding: 0;
            margin: 0;
            background: transparent;
            max-width: 100%;
        }
        .erro {
            background: rgba(225, 6, 0, 0.12);
            border: 1px solid var(--f1-red);
            border-radius: var(--radius);
            color: #ff6b6b;
            padding: 0.65rem 1rem;
            font-size: 0.88rem;
            margin-bottom: 1rem;
        }
    </style>
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
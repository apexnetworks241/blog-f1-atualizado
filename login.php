<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Blog F1 26</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .painel { display: none; }
        .painel.ativo { display: block; }

        .switch-link {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.85rem;
            color: var(--f1-muted);
        }

        .switch-link button {
            background: none;
            border: none;
            color: var(--f1-red);
            font-family: var(--font-display);
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            cursor: pointer;
            padding: 0;
            text-decoration: underline;
            align-self: unset;
            transform: none;
            box-shadow: none;
        }

        .switch-link button:hover {
            color: var(--f1-white);
            background: none;
            transform: none;
            box-shadow: none;
        }
    </style>
</head>
<body>
    <div class="login-wrap">
        <div class="login-box">

            <!-- ===== PAINEL LOGIN ===== -->
            <div id="painel-login" class="painel ativo">
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

                <div class="switch-link">
                    Não tem conta?
                    <button onclick="trocarPainel('painel-cadastro', 'painel-login')">Cadastre-se</button>
                </div>
            </div>

            <!-- ===== PAINEL CADASTRO ===== -->
            <div id="painel-cadastro" class="painel">
                <h2>Criar conta</h2>
                <p>Blog F1 26 — novo usuário</p>

                <?php if (!empty($_GET['erro_cad'])): ?>
                    <div class="erro">
                        <?php
                        $erros_cad = [
                            'email_uso'  => 'Este email já está cadastrado.',
                            'senha_curta'=> 'A senha deve ter pelo menos 6 caracteres.',
                            'campos'     => 'Preencha todos os campos.',
                        ];
                        echo $erros_cad[$_GET['erro_cad']] ?? 'Erro no cadastro.';
                        ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($_GET['ok']) && $_GET['ok'] === 'cadastro'): ?>
                    <div class="erro" style="background:rgba(0,200,80,0.10); border-color:#00c850; color:#4dff9a;">
                        Conta criada com sucesso! Faça login abaixo.
                    </div>
                <?php endif; ?>

                <form action="ctrl-cadastro.php" method="post">
                    <label>Nome</label>
                    <input type="text" name="nome_user" required placeholder="Seu nome">

                    <label>Email</label>
                    <input type="email" name="email_user" required placeholder="seu@email.com">

                    <label>Senha</label>
                    <input type="password" name="senha" required placeholder="Mínimo 6 caracteres">

                    <input type="submit" value="Cadastrar" style="width:100%; margin-top:0.5rem;">
                </form>

                <div class="switch-link">
                    Já tem conta?
                    <button onclick="trocarPainel('painel-login', 'painel-cadastro')">Entrar</button>
                </div>
            </div>

        </div>
    </div>

    <script>
        function trocarPainel(mostrar, esconder) {
            document.getElementById(esconder).classList.remove('ativo');
            document.getElementById(mostrar).classList.add('ativo');
        }

        // Se vier erro de cadastro ou sucesso de cadastro, abre o painel certo
        const params = new URLSearchParams(window.location.search);
        if (params.has('erro_cad')) {
            trocarPainel('painel-cadastro', 'painel-login');
        }
        if (params.get('ok') === 'cadastro') {
            trocarPainel('painel-cadastro', 'painel-login');
        }
    </script>
</body>
</html>
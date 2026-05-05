<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: nova-novidade.php');
    exit;
}

$db_path = __DIR__ . '/blog_f1.db';

$titulo   = trim($_POST['titulo']   ?? '');
$conteudo = trim($_POST['conteudo'] ?? '');
$data_pub = date('Y-m-d');

if ($titulo === '' || $conteudo === '') {
    header('Location: nova-novidade.php?status=erro');
    exit;
}

try {
    $pdo = new PDO('sqlite:' . $db_path);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("
        CREATE TABLE IF NOT EXISTS novidades (
            id_novidades INTEGER PRIMARY KEY AUTOINCREMENT,
            titulo       TEXT NOT NULL,
            conteudo     TEXT NOT NULL,
            data_pub     TEXT NOT NULL
        )
    ");

    $stmt = $pdo->prepare("
        INSERT INTO novidades (titulo, conteudo, data_pub)
        VALUES (:titulo, :conteudo, :data_pub)
    ");

    $stmt->execute([
        ':titulo'   => $titulo,
        ':conteudo' => $conteudo,
        ':data_pub' => $data_pub,
    ]);

    header('Location: nova-novidade.php?status=ok');
    exit;

} catch (PDOException $e) {
    error_log('Erro ao salvar novidade: ' . $e->getMessage());
    header('Location: nova-novidade.php?status=erro');
    exit;
}
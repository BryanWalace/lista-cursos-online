<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Portal de Cursos</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="topo">
    <div class="topo-container">
        <div class="topo-content">
            <div>
                <h1>Portal de Cursos</h1>
                <?php if (isset($_SESSION['logado'])): ?>
                    <a href="index.php" class="btn-sair">Início</a>
                <?php endif; ?>
            </div>

            <?php if (isset($_SESSION['logado'])): ?>
                <div>
                    <span>Bem-vindo, <?= $_SESSION['usuario'] ?></span>
                    <a href="logout.php" class="btn-sair">Sair</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <hr>
</header>

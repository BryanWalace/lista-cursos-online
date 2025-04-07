<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $imagem = $_POST['imagem'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];

    $caminho = 'cursos.json';
    $cursos = file_exists($caminho) ? json_decode(file_get_contents($caminho), true) : [];

    $novoCurso = [
        'id' => uniqid(),
        'titulo' => $titulo,
        'imagem' => $imagem,
        'categoria' => $categoria,
        'descricao' => $descricao
    ];

    $cursos[] = $novoCurso;

    file_put_contents($caminho, json_encode($cursos, JSON_PRETTY_PRINT));

    header("Location: index.php");
    exit;
}
?>

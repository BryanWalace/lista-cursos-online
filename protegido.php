<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}
include 'includes/cabecalho.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novo = [
        'id' => uniqid(),
        'titulo' => $_POST['titulo'],
        'imagem' => $_POST['imagem'],
        'categoria' => $_POST['categoria'],
        'descricao' => $_POST['descricao']
    ];
    $_SESSION['novos_cursos'][$novo['id']] = $novo;
}
?>
<h2>Área Restrita - Cadastro de Curso</h2>
<a href="logout.php">Sair</a>
<form method="POST">
    <input name="titulo" placeholder="Título" required>
    <input name="imagem" placeholder="URL da Imagem" required>
    <input name="categoria" placeholder="Categoria" required>
    <textarea name="descricao" placeholder="Descrição" required></textarea>
    <button type="submit">Cadastrar</button>
</form>
<?php include 'includes/rodape.php'; ?>

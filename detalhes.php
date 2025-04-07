<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}

require_once 'includes/funcoes.php';

$caminhoCursos = __DIR__ . '/cursos.json';
$cursos = file_exists($caminhoCursos) ? json_decode(file_get_contents($caminhoCursos), true) : [];

$id = $_GET['id'] ?? null;
$cursoSelecionado = null;

if ($id !== null) {
    foreach ($cursos as $curso) {
        if ($curso['id'] === $id) {
            $cursoSelecionado = $curso;
            break;
        }
    }
}

include 'includes/cabecalho.php';
?>

<h2>Detalhes do Curso</h2>

<?php if (!$cursoSelecionado): ?>
    <p>Curso não encontrado.</p>
<?php else: ?>
    <div class="curso-detalhes">
        <h3><?= htmlspecialchars($cursoSelecionado['titulo']) ?></h3>
        <img src="<?= htmlspecialchars(converterImgurParaDireto($cursoSelecionado['imagem'])) ?>" alt="Imagem do curso">
        <p><strong>Categoria:</strong> <?= htmlspecialchars($cursoSelecionado['categoria']) ?></p>
        <p><?= nl2br(htmlspecialchars($cursoSelecionado['descricao'])) ?></p>
    </div>
    <p><a href="index.php">⬅ Voltar para lista</a></p>
<?php endif; ?>

<?php include 'includes/rodape.php'; ?>

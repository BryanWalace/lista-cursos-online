<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}
// carregar os curso e exibir 
require_once 'includes/filtros.php';
require_once 'includes/funcoes.php';

$caminho = __DIR__ . '/cursos.json';
$cursos = file_exists($caminho) ? json_decode(file_get_contents($caminho), true) : [];

$categoriaSelecionada = $_GET['categoria'] ?? null;
$categorias = buscarCategoriasUnicas($cursos);
$cursosFiltrados = filtrarCursosPorCategoria($cursos, $categoriaSelecionada);

include 'includes/cabecalho.php';
?>
<section class="content">
<div class="tit-content">
    <h2>Cursos Disponíveis</h2>
    <?php if (isset($_SESSION['logado'])): ?>
        <p class="btn-add"><a href="adicionar.php">➕ Adicionar Novo Curso</a></p>
    <?php endif; ?>

    <!-- Filtro de Categorias -->
    <form method="get">
        <label for="categoria">Filtrar por categoria:</label>
        <select name="categoria" id="categoria" onchange="this.form.submit()" class="select-cont">
            <option value="">-- Todas --</option>
            <?php foreach ($categorias as $cat): ?>
                <option value="<?= htmlspecialchars($cat) ?>" <?= $cat === $categoriaSelecionada ? 'selected' : '' ?>>
                    <?= htmlspecialchars($cat) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>
</div>

<?php if (empty($cursosFiltrados)): ?>
    <p>Nenhum curso encontrado nesta categoria.</p>
<?php else: ?>
    <div class="cursos-container">
        <?php foreach ($cursosFiltrados as $curso): ?>
            <div class="curso-card">
                <h3><?= htmlspecialchars($curso['titulo']) ?></h3>
                <img src="<?= htmlspecialchars(converterImgurParaDireto($curso['imagem'])) ?>" alt="Imagem do curso">
                <br>
                <a href="detalhes.php?id=<?= $curso['id'] ?>">Ver mais</a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<?php include 'includes/rodape.php'; ?>
</section>
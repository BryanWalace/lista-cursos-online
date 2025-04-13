<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}

$caminhoCategorias = __DIR__ . '/categorias.json';
$categorias = file_exists($caminhoCategorias) ? json_decode(file_get_contents($caminhoCategorias), true) : [];

include 'includes/cabecalho.php';
?>
<section class="add-curso">
    <div class="add-curso-content">
        <h2>Adicionar Novo Curso</h2>

        <form action="salvar_curso.php" method="post">
            <label>Título:</label><br>
            <input type="text" name="titulo" required><br><br>

            <label>Imagem (URL):</label><br> 
            <input type="text" name="imagem" required><br><br>

            <label>Categoria:</label><br>
            <select name="categoria" required class="select-curso">
                <option value="">-- Selecione uma categoria --</option>
                <?php foreach ($categorias as $cat): ?>
                    <option value="<?= htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat) ?></option>
                <?php endforeach; ?>
            </select><br><br>

            <label>Descrição:</label><br>
            <textarea name="descricao" rows="5" required></textarea><br><br>

            <button type="submit">Salvar Curso</button>

            <p>Imagens diretas do site Imgur <a href="https://imgur.com/" target="_blank">Clique aqui</a></p>
        </form>
    </div>
</section>
<?php include 'includes/rodape.php'; ?>

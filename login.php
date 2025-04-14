<?php
session_start();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $usuarios = json_decode(file_get_contents('usuarios.json'), true) ?? [];

    if (isset($usuarios[$usuario]) && $usuarios[$usuario] === $senha) {
        $_SESSION['logado'] = true;
        $_SESSION['usuario'] = $usuario;
        header("Location: index.php");
        exit;
    } else {
        $erro = "Usuário ou senha inválidos.";
    }
}
?>

<link rel="stylesheet" href="assets/css/style.css">
<section class="login">
    <div class="login-content">
        <h2>Login</h2>
        <form method="post">
            <label>Usuário: <input type="text" name="usuario" required></label><br>
            <label>Senha: <input type="password" name="senha" required></label><br>
            <button type="submit">Entrar</button>
        </form>
        <p>Não tem conta? <a href="registrar.php">Cadastre-se aqui</a></p>
        <?php if (isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
    </div>
</section>

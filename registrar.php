<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $usuarios = json_decode(file_get_contents('usuarios.json'), true) ?? [];

    if (isset($usuarios[$usuario])) {
        $erro = "Usuário já existe!";
    } else {
        $usuarios[$usuario] = $senha;
        file_put_contents('usuarios.json', json_encode($usuarios));
        header("Location: login.php");
        exit;
    }
}
?>

<h2>Registro</h2>
<form method="post">
    <label>Usuário: <input type="text" name="usuario" required></label><br>
    <label>Senha: <input type="password" name="senha" required></label><br>
    <button type="submit">Registrar</button>
</form>
<?php if (isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>

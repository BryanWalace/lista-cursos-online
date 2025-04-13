<?php
session_start();

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$usuarios = json_decode(file_get_contents('usuarios.json'), true);

if (isset($usuarios[$usuario]) && password_verify($senha, $usuarios[$usuario])) {
    $_SESSION['logado'] = true;
    $_SESSION['usuario'] = $usuario;
    header('Location: index.php');
    exit;
} else {
    echo "Login inválido. <a href='login.php'>Tentar novamente</a>";
}

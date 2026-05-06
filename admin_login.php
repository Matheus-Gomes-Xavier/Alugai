<?php
session_start();
include('db.php');

if (isset($_SESSION['admin'])) {
    header("Location: admin_dashboard.php");
    exit;
}

$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $stmt = $conn->prepare("SELECT * FROM administradores WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();
        // Suporte a password_hash e senhas legadas em texto puro
        if (password_verify($senha, $admin['senha']) || $admin['senha'] === $senha) {
            $_SESSION['admin'] = $admin;
            header("Location: admin_dashboard.php");
            exit;
        }
    }
    $erro = "Login inválido.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Login Admin - AlugaAi</title>
<link rel="stylesheet" href="style_login_dashboard.css" />
</head>
<body>
<div class="container">
    <a href="index.php" class="back-link">← Voltar ao início</a>
    <h2>Login Administrador</h2>
    <?php if ($erro): ?>
      <div class="error-msg"><?= htmlspecialchars($erro) ?></div>
    <?php endif; ?>
    <form method="post" action="">
      <input type="email"    name="email" placeholder="Email" required />
      <input type="password" name="senha" placeholder="Senha" required />
      <button type="submit">Entrar</button>
    </form>
</div>
</body>
</html>

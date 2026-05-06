<?php
session_start();
include('db.php');

$current = basename($_SERVER['PHP_SELF']);
$referer = $_SERVER['HTTP_REFERER'] ?? '';

if (!isset($_SESSION['return_to']) && !str_contains($referer, $current) && !str_contains($referer, 'register.php')) {
    $_SESSION['return_to'] = $referer;
}

if (isset($_SESSION['user'])) {
    if (isset($_SESSION['return_to']) && $_SESSION['return_to'] !== '') {
        $redir = $_SESSION['return_to'];
        unset($_SESSION['return_to']);
        header("Location: $redir");
    } else {
        header("Location: dashboard.php");
    }
    exit;
}

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $usuario = $result->fetch_assoc();
        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['user'] = $usuario;
            if (isset($_SESSION['return_to']) && $_SESSION['return_to'] !== '') {
                $redir = $_SESSION['return_to'];
                unset($_SESSION['return_to']);
                header("Location: $redir");
            } else {
                header("Location: dashboard.php");
            }
            exit;
        }
    }
    $erro = "Email ou senha inválidos.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login - AlugaAi</title>
  <link rel="stylesheet" href="style_login_dashboard.css" />
</head>
<body>
  <div class="container">
    <a href="index.php" class="back-link">← Voltar ao início</a>
    <h2>Entrar</h2>
    <?php if ($erro): ?>
      <div class="error-msg"><?= htmlspecialchars($erro) ?></div>
    <?php endif; ?>
    <form method="post" action="">
      <input type="email" name="email" placeholder="Email" required />
      <input type="password" name="senha" placeholder="Senha" required />
      <button type="submit">Entrar</button>
    </form>
    <p style="margin-top: 1.2rem; text-align: center; color: #ccc;">
      Não tem uma conta? <a href="register.php" style="color:#f39c12; text-decoration:none;">Inscreva-se</a>
    </p>
  </div>
</body>
</html>

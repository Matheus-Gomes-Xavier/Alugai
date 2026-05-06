<?php
session_start();
include('db.php');

if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit;
}

$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome  = trim($_POST['nome']  ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    if ($nome === '' || $email === '' || $senha === '') {
        $erro = "Preencha todos os campos.";
    } elseif (strlen($senha) < 6) {
        $erro = "A senha deve ter pelo menos 6 caracteres.";
    } else {
        $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $erro = "Email já cadastrado.";
        } else {
            $hash = password_hash($senha, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nome, $email, $hash);
            $stmt->execute();
            header("Location: login.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cadastro - AlugaAi</title>
  <link rel="stylesheet" href="style_login_dashboard.css" />
</head>
<body>
  <div class="container">
    <a href="index.php" class="back-link">← Voltar ao início</a>
    <h2>Criar Conta</h2>
    <?php if ($erro): ?>
      <div class="error-msg"><?= htmlspecialchars($erro) ?></div>
    <?php endif; ?>
    <form method="post" action="">
      <input type="text"     name="nome"  placeholder="Nome completo" required value="<?= htmlspecialchars($_POST['nome']  ?? '') ?>" />
      <input type="email"    name="email" placeholder="Email"         required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" />
      <input type="password" name="senha" placeholder="Senha (mín. 6 caracteres)" required />
      <button type="submit">Cadastrar</button>
    </form>
    <p style="margin-top: 1rem; text-align: center;">
      Já tem uma conta? <a href="login.php" style="color:#f39c12; text-decoration:none;">Entrar</a>
    </p>
  </div>
</body>
</html>

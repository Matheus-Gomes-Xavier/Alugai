<?php
session_start();
include('db.php');

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo    = trim($_POST['titulo']    ?? '');
    $categoria = $_POST['categoria']      ?? '';
    $descricao = trim($_POST['descricao'] ?? '');
    $usuario_id = $_SESSION['user']['id'];

    if ($titulo === '' || !in_array($categoria, ['cozinha', 'marcenaria', 'informatica', 'outros'])) {
        $erro = "Preencha todos os campos corretamente.";
    } else {
        $stmt = $conn->prepare("INSERT INTO itens (titulo, categoria, descricao, usuario_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $titulo, $categoria, $descricao, $usuario_id);
        $stmt->execute();
        header("Location: dashboard.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cadastrar Item - AlugaAi</title>
  <link rel="stylesheet" href="style_login_dashboard.css" />
</head>
<body>
  <div class="container">
    <a href="dashboard.php" class="back-link">← Voltar à minha conta</a>
    <h2>Cadastrar Item</h2>
    <?php if ($erro): ?>
      <div class="error-msg"><?= htmlspecialchars($erro) ?></div>
    <?php endif; ?>
    <form method="post" action="">
      <input type="text" name="titulo" placeholder="Título do item" required
             value="<?= htmlspecialchars($_POST['titulo'] ?? '') ?>" />
      <select name="categoria" required>
        <option value="" disabled <?= !isset($_POST['categoria']) ? 'selected' : '' ?>>Selecione uma categoria</option>
        <option value="cozinha"    <?= (($_POST['categoria'] ?? '') === 'cozinha')    ? 'selected' : '' ?>>Cozinha</option>
        <option value="marcenaria" <?= (($_POST['categoria'] ?? '') === 'marcenaria') ? 'selected' : '' ?>>Marcenaria</option>
        <option value="informatica"<?= (($_POST['categoria'] ?? '') === 'informatica')? 'selected' : '' ?>>Informática</option>
        <option value="outros"     <?= (($_POST['categoria'] ?? '') === 'outros')     ? 'selected' : '' ?>>Outros</option>
      </select>
      <textarea name="descricao" placeholder="Descrição do item (opcional)" rows="4"
        ><?= htmlspecialchars($_POST['descricao'] ?? '') ?></textarea>
      <button type="submit">Cadastrar</button>
    </form>
  </div>
</body>
</html>

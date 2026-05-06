<?php
session_start();
include('db.php');

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$usuario_id = $_SESSION['user']['id'];

// Apagar item do próprio usuário
if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    $stmt = $conn->prepare("DELETE FROM itens WHERE id = ? AND usuario_id = ?");
    $stmt->bind_param("ii", $id, $usuario_id);
    $stmt->execute();
    header("Location: dashboard.php");
    exit;
}

// Editar item do próprio usuário
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_id'])) {
    $id       = intval($_POST['edit_id']);
    $titulo   = trim($_POST['titulo']   ?? '');
    $categoria = $_POST['categoria']    ?? '';
    $descricao = trim($_POST['descricao'] ?? '');

    if ($titulo && in_array($categoria, ['cozinha', 'marcenaria', 'informatica', 'outros'])) {
        $stmt = $conn->prepare("UPDATE itens SET titulo = ?, categoria = ?, descricao = ? WHERE id = ? AND usuario_id = ?");
        $stmt->bind_param("sssii", $titulo, $categoria, $descricao, $id, $usuario_id);
        $stmt->execute();
    }
    header("Location: dashboard.php");
    exit;
}

$result = $conn->prepare("SELECT * FROM itens WHERE usuario_id = ? ORDER BY criado_em DESC");
$result->bind_param("i", $usuario_id);
$result->execute();
$itens = $result->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Minha Conta - AlugaAi</title>
  <link rel="stylesheet" href="style_login_dashboard.css" />
  <style>
    body { align-items: flex-start; padding: 2rem 1rem; }
    .container { max-width: 700px; }

    .item-card {
      background: #1e1e1e;
      border-radius: 10px;
      padding: 1.2rem;
      margin-bottom: 1rem;
      border: 1px solid #2a2a2a;
    }
    .item-card summary {
      cursor: pointer;
      font-weight: 600;
      font-size: 1rem;
      color: #f39c12;
      list-style: none;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .item-card summary::-webkit-details-marker { display: none; }
    .item-card summary .badge {
      font-size: 0.72rem;
      background: #2a2a2a;
      color: #aaa;
      padding: 2px 8px;
      border-radius: 20px;
      font-weight: 400;
    }
    .item-card .edit-area {
      margin-top: 1rem;
      display: flex;
      flex-direction: column;
      gap: 0.6rem;
    }
    .item-card input,
    .item-card select,
    .item-card textarea {
      padding: 0.6rem 0.8rem;
      border-radius: 7px;
      border: none;
      background: #2a2a2a;
      color: #eee;
      font-size: 0.95rem;
      width: 100%;
    }
    .item-card textarea { resize: vertical; min-height: 70px; }
    .item-actions {
      display: flex;
      gap: 0.6rem;
      margin-top: 0.4rem;
    }
    .btn-save {
      background: #f39c12;
      color: #121212;
      font-weight: 700;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 7px;
      cursor: pointer;
    }
    .btn-save:hover { background: #d87e04; }
    .btn-delete {
      background: transparent;
      color: #e74c3c;
      font-weight: 700;
      border: 1px solid #e74c3c;
      padding: 0.5rem 1rem;
      border-radius: 7px;
      cursor: pointer;
      text-decoration: none;
      font-size: 0.9rem;
    }
    .btn-delete:hover { background: #e74c3c; color: #fff; }
    .empty-state {
      text-align: center;
      padding: 2rem;
      color: #777;
    }
    .empty-state a { color: #f39c12; text-decoration: none; font-weight: 600; }
    .add-btn {
      display: inline-block;
      background: #f39c12;
      color: #121212;
      font-weight: 700;
      padding: 0.6rem 1.2rem;
      border-radius: 8px;
      text-decoration: none;
      font-size: 0.95rem;
    }
    .add-btn:hover { background: #d87e04; }
  </style>
</head>
<body>
  <div class="container">
    <a href="index.php" class="back-link">← Voltar ao início</a>

    <div class="dashboard-header">
      <h2>Meus Itens</h2>
      <div style="display:flex; gap:0.8rem; align-items:center;">
        <a href="cadastro_item.php" class="add-btn">+ Novo item</a>
        <a href="logout.php" style="color:#f39c12; text-decoration:none; font-weight:600;">Sair</a>
      </div>
    </div>

    <?php if (empty($itens)): ?>
      <div class="empty-state">
        <p>Você ainda não cadastrou nenhum item.</p>
        <a href="cadastro_item.php">Cadastrar primeiro item →</a>
      </div>
    <?php else: ?>
      <?php foreach ($itens as $item): ?>
        <details class="item-card">
          <summary>
            <?= htmlspecialchars($item['titulo']) ?>
            <span class="badge"><?= htmlspecialchars($item['categoria']) ?></span>
          </summary>
          <div class="edit-area">
            <form method="post" action="">
              <input type="hidden" name="edit_id" value="<?= $item['id'] ?>" />
              <input type="text" name="titulo" value="<?= htmlspecialchars($item['titulo']) ?>" required placeholder="Título" />
              <select name="categoria" required>
                <?php foreach (['cozinha' => 'Cozinha', 'marcenaria' => 'Marcenaria', 'informatica' => 'Informática', 'outros' => 'Outros'] as $val => $label): ?>
                  <option value="<?= $val ?>" <?= $item['categoria'] === $val ? 'selected' : '' ?>><?= $label ?></option>
                <?php endforeach; ?>
              </select>
              <textarea name="descricao" placeholder="Descrição (opcional)"><?= htmlspecialchars($item['descricao']) ?></textarea>
              <div class="item-actions">
                <button type="submit" class="btn-save">Salvar</button>
                <a href="dashboard.php?delete_id=<?= $item['id'] ?>"
                   class="btn-delete"
                   onclick="return confirm('Tem certeza que deseja apagar este item?')">Apagar</a>
              </div>
            </form>
          </div>
        </details>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</body>
</html>

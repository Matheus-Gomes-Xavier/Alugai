<?php
session_start();
include('db.php');

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}

// Apagar item
if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    $stmt = $conn->prepare("DELETE FROM itens WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: admin_dashboard.php");
    exit;
}

// Atualizar item
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_id'])) {
    $id = intval($_POST['edit_id']);
    $titulo = $_POST['titulo'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    $descricao = $_POST['descricao'] ?? '';

    if ($titulo && in_array($categoria, ['cozinha', 'marcenaria', 'outros'])) {
        $stmt = $conn->prepare("UPDATE itens SET titulo = ?, categoria = ?, descricao = ? WHERE id = ?");
        $stmt->bind_param("sssi", $titulo, $categoria, $descricao, $id);
        $stmt->execute();
    }
    header("Location: admin_dashboard.php");
    exit;
}

// Buscar itens
$result = $conn->query("SELECT * FROM itens ORDER BY categoria, criado_em DESC");
$itens = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Admin Dashboard - RentHub</title>
<link rel="stylesheet" href="style-login-dashboard.css" />
<style>
  table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
  th, td { border: 1px solid #444; padding: 10px; text-align: left; }
  th { background-color: #333; }
  tr:nth-child(even) { background-color: #2a2a2a; }
  form.edit-form input, form.edit-form select, form.edit-form textarea {
    width: 100%;
    margin: 3px 0;
    padding: 5px;
    border-radius: 5px;
    border: none;
    background: #444;
    color: #eee;
  }
  form.edit-form button {
    background: #f39c12;
    border: none;
    padding: 7px 12px;
    border-radius: 5px;
    cursor: pointer;
    color: #121212;
    font-weight: 700;
  }
  form.edit-form button:hover {
    background: #d87e04;
  }
  .btn-delete {
    background: #e74c3c;
    color: #fff;
    padding: 6px 10px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: 700;
  }
  .btn-delete:hover {
    background: #c0392b;
  }
</style>
</head>
<body>
<div class="container">
  <div class="dashboard-header" style="justify-content: space-between;">
    <h2>Administração de Itens</h2>
    <a href="admin_logout.php" style="color:#f39c12; text-decoration:none; font-weight:600;">Sair</a>
  </div>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Categoria</th>
        <th>Descrição</th>
        <th>Usuário ID</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($itens as $item): ?>
      <tr>
        <td><?= $item['id'] ?></td>
        <td>
          <form method="post" class="edit-form" action="">
            <input type="hidden" name="edit_id" value="<?= $item['id'] ?>" />
            <input type="text" name="titulo" value="<?= htmlspecialchars($item['titulo']) ?>" required />
        </td>
        <td>
            <select name="categoria" required>
              <option value="cozinha" <?= $item['categoria'] === 'cozinha' ? 'selected' : '' ?>>Cozinha</option>
              <option value="marcenaria" <?= $item['categoria'] === 'marcenaria' ? 'selected' : '' ?>>Marcenaria</option>
              <option value="outros" <?= $item['categoria'] === 'outros' ? 'selected' : '' ?>>Outros</option>
            </select>
        </td>
        <td>
            <textarea name="descricao" rows="2"><?= htmlspecialchars($item['descricao']) ?></textarea>
        </td>
        <td><?= $item['usuario_id'] ?></td>
        <td style="white-space: nowrap;">
            <button type="submit">Salvar</button>
          </form>
          <a class="btn-delete" href="admin_dashboard.php?delete_id=<?= $item['id'] ?>" onclick="return confirm('Tem certeza que deseja apagar este item?')">Apagar</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
</body>
</html>

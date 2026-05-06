<<<<<<< HEAD
<?php
session_start();
include('db.php');

// Buscar itens da categoria 'cozinha'
$result = $conn->prepare("SELECT * FROM itens WHERE categoria = ?");
$categoria = 'cozinha';
$result->bind_param("s", $categoria);
$result->execute();
$itens = $result->get_result();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cozinha - AlugaAi</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <!-- Header -->
  <header class="bg-dark text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
      <h1 class="h3">Aluga-ai</h1>
      <nav>
        <a href="index.php" class="text-white mx-2">Início</a>
        <a href="cozinha.php" class="text-warning mx-2">Cozinha</a>
        <a href="marcenaria.php" class="text-white mx-2">Marcenaria</a>
        <a href="informatica.php" class="text-white mx-2">Informática</a>
        <?php if(isset($_SESSION['user'])): ?>
          <a href="cadastro_item.php" class="text-white mx-2">Cadastrar</a>
          <a href="dashboard.php" class="text-white mx-2">Minha Conta</a>
          <a href="logout.php" class="text-white mx-2">Sair</a>
        <?php else: ?>
          <a href="login.php" class="text-white mx-2">Login</a>
          <a href="register.php" class="text-white mx-2">Registrar</a>
        <?php endif; ?>
      </nav>
    </div>
  </header>

  <!-- Catálogo -->
  <section class="py-5 bg-light">
    <div class="container">
      <h2 class="mb-4 text-center">Itens para Cozinha</h2>
      <div class="row g-4">
        <?php if($itens->num_rows === 0): ?>
          <p class="text-center">Nenhum item disponível nesta categoria.</p>
        <?php else: ?>
          <?php while($item = $itens->fetch_assoc()): ?>
            <div class="col-md-4">
              <div class="card h-100 shadow-sm">
                <div class="card-body">
                  <h5 class="card-title"><?= htmlspecialchars($item['titulo']) ?></h5>
                  <p class="card-text"><?= nl2br(htmlspecialchars($item['descricao'])) ?></p>
                </div>
                <div class="card-footer text-center">
                  <button class="btn btn-sm btn-warning">Alugar</button>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white py-3 text-center">
    <p class="mb-0">&copy; 2025 Aluga-ai. Todos os direitos reservados.</p>
  </footer>
</body>
</html>
=======
<?php
session_start();
include('db.php');

// Buscar itens da categoria 'cozinha'
$result = $conn->prepare("SELECT * FROM itens WHERE categoria = ?");
$categoria = 'cozinha';
$result->bind_param("s", $categoria);
$result->execute();
$itens = $result->get_result();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cozinha - AlugaAi</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <!-- Header -->
  <header class="bg-dark text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
      <h1 class="h3">Aluga-ai</h1>
      <nav>
        <a href="index.php" class="text-white mx-2">Início</a>
        <a href="cozinha.php" class="text-warning mx-2">Cozinha</a>
        <a href="marcenaria.php" class="text-white mx-2">Marcenaria</a>
        <a href="informatica.php" class="text-white mx-2">Informática</a>
        <?php if(isset($_SESSION['user'])): ?>
          <a href="cadastro_item.php" class="text-white mx-2">Cadastrar</a>
          <a href="dashboard.php" class="text-white mx-2">Minha Conta</a>
          <a href="logout.php" class="text-white mx-2">Sair</a>
        <?php else: ?>
          <a href="login.php" class="text-white mx-2">Login</a>
          <a href="register.php" class="text-white mx-2">Registrar</a>
        <?php endif; ?>
      </nav>
    </div>
  </header>

  <!-- Catálogo -->
  <section class="py-5 bg-light">
    <div class="container">
      <h2 class="mb-4 text-center">Itens para Cozinha</h2>
      <div class="row g-4">
        <?php if($itens->num_rows === 0): ?>
          <p class="text-center">Nenhum item disponível nesta categoria.</p>
        <?php else: ?>
          <?php while($item = $itens->fetch_assoc()): ?>
            <div class="col-md-4">
              <div class="card h-100 shadow-sm">
                <div class="card-body">
                  <h5 class="card-title"><?= htmlspecialchars($item['titulo']) ?></h5>
                  <p class="card-text"><?= nl2br(htmlspecialchars($item['descricao'])) ?></p>
                </div>
                <div class="card-footer text-center">
                  <button class="btn btn-sm btn-warning">Alugar</button>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white py-3 text-center">
    <p class="mb-0">&copy; 2025 Aluga-ai. Todos os direitos reservados.</p>
  </footer>
</body>
</html>
>>>>>>> 380c04207a3201c537ccdeb0ddc419c1a3ed70c5

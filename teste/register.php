
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<header class="bg-dark text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="h3">RentHub</h1>
        <nav>
            <a href="index.php" class="text-white mx-2">Início</a>
            <a href="cozinha.php" class="text-white mx-2">Cozinha</a>
            <a href="marcenaria.php" class="text-white mx-2">Marcenaria</a>
            <a href="login.php" class="text-white mx-2">Login</a>
            <a href="register.php" class="text-white mx-2">Registrar</a>
        </nav>
    </div>
</header>
<main class="container my-5">
<h2>Registrar</h2>
<form method="post" action="">
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="senha" class="form-label">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" required>
    </div>
    <button type="submit" class="btn btn-success">Registrar</button>
</form>
</main>
<footer class="bg-dark text-white py-3 text-center">
    <p class="mb-0">&copy; 2025 RentHub. Todos os direitos reservados.</p>
</footer>
</body>
</html>

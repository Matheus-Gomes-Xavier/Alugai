<?php
// index.php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlugaAi - Aluguel de Itens</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- Cabeçalho -->
    <header class="bg-dark text-white py-3 shadow-sm">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">Aluga-ai</h1>
            <nav>
                <a href="index.php" class="text-white mx-2">Início</a>
                <a href="cozinha.php" class="text-white mx-2">Cozinha</a>
                <a href="marcenaria.php" class="text-white mx-2">Marcenaria</a>
                <a href="cadastro_item.php" class="text-white mx-2">Cadastrar</a>
                <a href="login.php" class="text-white mx-2">Login</a>
                <a href="register.php" class="text-white mx-2">Registrar</a>
            </nav>
        </div>
    </header>

    <!-- Carrossel -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
<div class="carousel-inner">
<div class="carousel-item active">
<img src="img/cozinha.jpg" class="d-block w-100" alt="Cozinha" style="max-height: 550px; object-fit: cover;">
</div>
<div class="carousel-item">
<img src="img/marcenaria.jpg" class="d-block w-100" alt="Marcenaria" style="max-height: 550px; object-fit: cover;">
</div>
</div>
<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="visually-hidden">Anterior</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="visually-hidden">Próximo</span>
</button>
</div>

    <!-- Seção de Boas-vindas -->
    <section class="py-5 bg-light text-center">
        <div class="container">
            <h2 class="fw-bold mb-3">Encontre e alugue itens perto de você</h2>
            <p class="text-muted">Ferramentas, utensílios e muito mais – disponível quando você precisar!</p>
        </div>
    </section>

    <!-- Catálogo de Itens -->
    <section class="py-5">
        <div class="container">
            <h3 class="mb-4 text-center">Catálogo de Itens</h3>
            <div class="row g-4">
                <!-- Item 1 -->
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <img src="img/makita.jpg" class="card-img-top" alt="Furadeira Makita" style="height:220px; object-fit:cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Furadeira Makita</h5>
                            <p class="card-text text-muted">Perfeita para serviços de marcenaria e pequenas reformas.</p>
                            <a href="marcenaria.php" class="btn btn-primary mt-auto">Ver mais</a>
                        </div>
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <img src="img/cozinha.jpg" class="card-img-top" alt="Conjunto de Panelas" style="height:220px; object-fit:cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Conjunto de Panelas</h5>
                            <p class="card-text text-muted">Utensílios essenciais para preparar qualquer refeição.</p>
                            <a href="cozinha.php" class="btn btn-primary mt-auto">Ver mais</a>
                        </div>
                    </div>
                </div>
                <!-- Item 3 -->
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <img src="img/marcenaria.jpg" class="card-img-top" alt="Kit de Ferramentas" style="height:220px; object-fit:cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Kit de Ferramentas</h5>
                            <p class="card-text text-muted">Completo para trabalhos manuais e reparos rápidos.</p>
                            <a href="marcenaria.php" class="btn btn-primary mt-auto">Ver mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mapa -->
    <section class="py-5 text-center bg-light">
        <div class="container">
            <h3 class="mb-4">Veja os itens disponíveis perto de você</h3>
            <div id="map" style="width:100%; height:400px; border-radius:10px;"></div>
        </div>
    </section>

    <!-- Rodapé -->
    <footer class="bg-dark text-white py-3 text-center">
        <p class="mb-0">&copy; 2025 Aluga-ai. Todos os direitos reservados.</p>
    </footer>

    <script>
        function initMap() {
            navigator.geolocation.getCurrentPosition(function (position) {
                const userLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                const map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 12,
                    center: userLocation
                });
                new google.maps.Marker({
                    position: userLocation,
                    map: map,
                    title: "Você está aqui"
                });
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=SUA_API_KEY&callback=initMap" async defer></script>
</body>
</html>

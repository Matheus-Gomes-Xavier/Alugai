<<<<<<< HEAD
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
                <a href="informatica.php" class="text-white mx-2">Informática</a>
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
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Catálogo de Itens</h2>
                <button class="btn btn-sm btn-outline-primary" onclick="toggleMap()">Localização</button>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <!-- Item 1 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="img/batedeira.jpg" class="card-img-top" alt="Batedeira">
                        <div class="card-body">
                            <h5 class="card-title">Batedeira</h5>
                            <p class="card-text">Perfeita para preparar bolos e massas.</p>
                        </div>
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="img/serra-eletrica.jpg" class="card-img-top" alt="Serra Elétrica">
                        <div class="card-body">
                            <h5 class="card-title">Serra Elétrica</h5>
                            <p class="card-text">Ideal para trabalhos de marcenaria.</p>
                        </div>
                    </div>
                </div>
                <!-- Item 3 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="img/furadeira.jpg" class="card-img-top" alt="Furadeira">
                        <div class="card-body">
                            <h5 class="card-title">Furadeira</h5>
                            <p class="card-text">Compacta e eficiente para pequenos reparos.</p>
                        </div>
                    </div>
                </div>
                <!-- Item 4 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="img/panela.jpg" class="card-img-top" alt="Panela de Pressão">
                        <div class="card-body">
                            <h5 class="card-title">Panela de Pressão</h5>
                            <p class="card-text">Facilita o preparo de refeições rápidas.</p>
                        </div>
                    </div>
                </div>
                <!-- Item 5 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="img/escada.jpg" class="card-img-top" alt="Escada de Alumínio">
                        <div class="card-body">
                            <h5 class="card-title">Escada de Alumínio</h5>
                            <p class="card-text">Segura e leve para alcançar lugares altos.</p>
                        </div>
                    </div>
                </div>
                <!-- Item 6 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="img/projetor.jpg" class="card-img-top" alt="Projetor">
                        <div class="card-body">
                            <h5 class="card-title">Projetor</h5>
                            <p class="card-text">Perfeito para reuniões ou sessões de cinema em casa.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Localização (oculta inicialmente) -->
    <section id="location-section" class="py-5 bg-light" style="display: none;">
        <div class="container">
            <h2 class="mb-4">Encontre Itens Perto de Você</h2>
            <div id="map" style="width:100%; height:400px;"></div>
        </div>
    </section>

    <!-- Rodapé -->
    <footer class="bg-dark text-white py-3 text-center">
        <p class="mb-0">&copy; 2025 Aluga-ai. Todos os direitos reservados.</p>
    </footer>

    <script>
        function toggleMap() {
            const section = document.getElementById("location-section");
            section.style.display = (section.style.display === "none") ? "block" : "none";
        }

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



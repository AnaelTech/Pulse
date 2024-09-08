<?php
require_once __DIR__ . "/layout/header.php";
require_once __DIR__ . "/classes/error.php";
?>
<?php if (isset($_GET['error'])) { ?>
    <div id="Alert" class="bg-danger text-white w-100 py-5 px-4 fixed-top">
        <i class="bi bi-exclamation-circle me-2"></i>
        <?php echo Errors::getErrorMessage($_GET['error']); ?>
    </div>
    <script>
        window.addEventListener('load', function() {
            const alertElement = document.getElementById('Alert');
            const navbar = document.getElementById('nav-home');

            if (alertElement) {
                // Obtenir la hauteur de l'alerte et ajuster la position de la navbar
                const alertHeight = alertElement.offsetHeight;
                navbar.style.top = alertHeight + 'px';

                // Cacher l'alerte après 5 secondes
                setTimeout(function() {
                    alertElement.classList.add('hide');
                    // Réinitialiser la position de la navbar après la disparition de l'alerte
                    setTimeout(() => {
                        navbar.style.top = '0';
                    }, 1000); // 1000 millisecondes = 1 seconde (correspond à la durée de la transition)
                }, 5000);
            }
        });
    </script>
<?php } ?>
<!-- Navbar -->
<nav id="nav-home" class="navbar navbar-light mt-4 rounded-pill container px-3 fixed-top">
    <div class="container px-4 px-lg-5">
        <div class="brand">
            <img src="assets/logoPulse.png" alt="" class="img-fluid">
        </div>

        <a href="login-responsive.php" class="btn btn-outline-primary d-lg-none rounded-pill">Connexion</a>

        <div class="d-none d-lg-flex">
            <form class="d-flex ms-auto mt-2 mt-lg-0" method="POST" action="loginProcess.php?source=desktop">
                <label for="email-lg" class="visually-hidden">Email:</label>
                <input id="email-lg" class="form-control mx-2 px-4 rounded-pill" type="email" placeholder="Email" aria-label="email" name="email" required>

                <label for="password-lg" class="visually-hidden">Password:</label>
                <input id="password-lg" class="form-control mx-2 px-4 rounded-pill" type="password" placeholder="Password" aria-label="password" name="password" required>

                <button class="btn btn-outline-primary rounded-pill ms-3 px-4" type="submit" name="valider">Connexion</button>
            </form>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<header id="hero" class="masthead">
    <div class="container px-4 px-lg-5">
        <div class="hero-content">
            <div class="home-text col-lg-6 align-items-start justify-content-start text-left">
                <h1 class="font-weight-bold">Dynamisez Votre Pulse et Connectez-vous au Monde</h1>
                <p class="text-muted">Exploitez le pouvoir des connexions sociales pour amplifier votre voix, élargir votre réseau et interagir comme jamais auparavant !</p>
                <div class="mt-4">
                    <a class="btn btn-primary btn-xl me-3 rounded-pill" href="inscription.php">Inscription</a>
                </div>
            </div>
            <div class="img-home col-lg-6">
                <img src="assets/jeunes-discutant-appareils.png" alt="">
            </div>
        </div>
    </div>
</header>
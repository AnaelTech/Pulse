<?php
require_once __DIR__ . "/layout/header.php";
require_once __DIR__ . "/classes/error.php";


// Bloque la page pour les écrans Desktop
// function isMobileDevice()
// {
//     return preg_match('/(android|iphone|ipad|ipod|blackberry|windows phone)/i', $_SERVER['HTTP_USER_AGENT']);
// }

// if (!isMobileDevice()) {
//     header('Location: home.php');
//     exit;
// }
?>

<?php if (isset($_GET['error'])) { ?>
    <div id="Alert" class="bg-danger text-white w-100 py-5 px-4 fixed-top">
        <i class="bi bi-exclamation-circle me-2"></i>
        <?php echo Errors::getErrorMessage($_GET['error']); ?>
    </div>
    <script>
        window.addEventListener('load', function() {
            const alertElement = document.getElementById('Alert');
            const top = document.getElementById('login-responsive');

            if (alertElement) {
                // Obtenir la hauteur de l'alerte et ajuster la position de la navbar
                const alertHeight = alertElement.offsetHeight;
                top.style.top = alertHeight + 'px';

                // Cacher l'alerte après 5 secondes
                setTimeout(function() {
                    alertElement.classList.add('hide');
                    // Réinitialiser la position de la navbar après la disparition de l'alerte
                    setTimeout(() => {
                        top.style.top = '0';
                    }, 1000); // 1000 millisecondes = 1 seconde (correspond à la durée de la transition)
                }, 5000);
            }
        });
    </script>
<?php } ?>

<section id="login-responsive">
    <div class="text-center pt-4">
        <h1>Login</h1>
    </div>
    <div class="container">
        <form class="d-flex flex-column ms-auto mt-2 mt-lg-0" method="POST" action="loginProcess.php?source=mobile">
            <label for="email-lg" class="visually-hidden">Email:</label>
            <input id="email-lg" class="form-control my-4 mx-2 px-4 rounded-pill" type="email" placeholder="Email" aria-label="email" name="email" required>

            <label for="password-lg" class="visually-hidden">Password:</label>
            <input id="password-lg" class="form-control my-4 mx-2 px-4 rounded-pill" type="password" placeholder="Password" aria-label="password" name="password" required>

            <button class="btn btn-outline-primary text-center rounded-pill my-4 ms-3" type="submit" name="valider">Connexion</button>
        </form>
        <div class="img-login-responsive">
            <img src="assets/img-login-responsive.png" alt="">
        </div>
    </div>
</section>
<script>
    // Vérification de la taille de l'écran
    function checkScreenSize() {
        if (window.innerWidth > 1024) { // Si l'écran dépasse 1024px (taille desktop)
            window.location.href = 'home.php'; // Redirection vers la page home.php
        }
    }

    // Exécuter la fonction lors du chargement de la page
    window.addEventListener('load', checkScreenSize);

    // Exécuter la fonction également si la fenêtre est redimensionnée
    window.addEventListener('resize', checkScreenSize);
</script>
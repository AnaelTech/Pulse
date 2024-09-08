<?php
require_once __DIR__ . "/layout/header.php";
require_once __DIR__ . "/classes/error.php";


// Bloque la page pour les écrans Desktop
// function isMobileDevice()
// {
// return preg_match('/(android|iphone|ipad|ipod|blackberry|windows phone)/i', $_SERVER['HTTP_USER_AGENT']);
// }

// if (!isMobileDevice()) {
// header('Location: home.php');
// exit;
// }
?>

<?php if (isset($_GET['error'])) { ?>
    <div id="Alert-mobile" class="bg-danger text-white py-5 px-4 fixed-top text-center">
        <i class="bi bi-exclamation-circle me-2"></i>
        <?php echo Errors::getErrorMessage($_GET['error']); ?>
    </div>
    <script>
        window.addEventListener('load', function() {
            const alertElement = document.getElementById('Alert-mobile');
            const loginSection = document.getElementById('login-responsive');

            if (alertElement) {
                const alertHeight = alertElement.offsetHeight;


                loginSection.classList.add('alert-visible');

                setTimeout(function() {
                    alertElement.classList.add('hide');


                    setTimeout(() => {
                        loginSection.classList.remove('alert-visible');
                    }, 500);
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
            <span class="text-center text-muted mt-5 mb-0">Pas de compte ?<a href="inscription.php" class="text-body text-decoration-none"> inscription ici 😊</a></span>
        </form>
        <div class="img-login-responsive">
            <img src="assets/img-login-responsive.png" alt="connexion-img">
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
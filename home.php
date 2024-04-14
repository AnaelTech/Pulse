<?php
require_once __DIR__ . "/layout/header.php";
require_once __DIR__ . "/classes/error.php";
?>
<?php if (isset($_GET['error'])) { ?>
    <div class="bg-danger text-white w-100 py-5 px-4">
        <?php echo Errors::getErrorMessage($_GET['error']); ?>
    </div>
<?php } ?>
<nav class="navbar navbar-light bg-white pt-3">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand bg-transparent text-black">Pulse</a>
        <form class="d-flex" method="POST" action="loginProcess.php">
            <input class="form-control me-2" type="email" placeholder="email" aria-label="email" name="email">
            <input class="form-control me-2" type="password" placeholder="password" aria-label="password" name="password">
            <button class="btn btn-outline-primary" type="submit" name="valider">Connexion</button>
        </form>
    </div>
</nav>
<main>
    <header class="masthead my-5 ">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="font-weight-bold">Pulse</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline my-5">
                    <p class="text-white-75 mb-5">Find your Friends 😁</p>
                    <a class="btn btn-primary btn-xl" href="inscription.php">S'inscrire</a>
                </div>
            </div>
        </div>
    </header>
    <!-- <section class="inscription">
        <div class="container">
            <div class="col-lg d-flex justify-content-center position-absolute bottom-0 start-50 translate-middle-x pb-4 mb-4">
                <div>
                    <a href="inscription.php" class="btn btn-primary btn-lg">S'inscrire</a>
                </div>
            </div>
        </div>
    </section> -->
</main>
</body>

</html>
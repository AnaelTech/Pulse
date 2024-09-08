<?php
$lastName   = $_GET['name']    ?? '';
$firstName  = $_GET['lastname']    ?? '';
$email      = $_GET['email']    ?? '';

require_once __DIR__ . "/layout/header.php";
require_once __DIR__ . "/classes/error.php";
?>
<?php if (isset($_GET['error'])) { ?>
    <div class="bg-danger text-white w-100 py-5 px-4">
        <?php echo Errors::getErrorMessage(intval($_GET['error'])); ?>
    </div>
<?php } ?>
<section id="inscription">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5 d-flex flex-column">
                            <img src="assets/logoPulse.png" alt="logo Pulse" class="img-fluid align-items-center">
                            <h2 class="text-uppercase text-center mb-5">Créer un compte</h2>

                            <form method="POST" action="registProcess.php">

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1cg">Prénom</label>
                                    <input type="text" id="form3Example1cg" class="form-control form-control-lg rounded-pill" name="name" required />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1cg">Nom</label>
                                    <input type="text" id="form3Example1cg" class="form-control form-control-lg rounded-pill" name="lastname" required />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example3cg">Email</label>
                                    <input type="email" id="form3Example3cg" class="form-control form-control-lg rounded-pill" name="email" required />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4cg">Mot de passe</label>
                                    <input type="password" id="form3Example4cg" class="form-control form-control-lg rounded-pill" name="password" required />
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-outline-primary btn-block btn-lg gradient-custom-4 rounded-pill" name="regist">S'enregistrer</button>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Déjà un compte ? <a href="home.php" class="text-body text-decoration-none">Connecte toi ici 😁</a></p>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
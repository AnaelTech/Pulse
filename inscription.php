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
<section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                            <form method="POST" action="registProcess.php">

                                <div class="form-outline mb-4">
                                    <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="name" />
                                    <label class="form-label" for="form3Example1cg">Your Name</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="lastname" />
                                    <label class="form-label" for="form3Example1cg">Your Last Name</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="email" />
                                    <label class="form-label" for="form3Example3cg">Your Email</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password" />
                                    <label class="form-label" for="form3Example4cg">Password</label>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg gradient-custom-4 text-body" name="regist">Register</button>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Have already an account ? <a href="home.php" class="fw-bold text-body"><u>Login here</u></a></p>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
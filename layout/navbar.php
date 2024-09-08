<nav id="navbarUser" class="navbar navbar-light navbar-expand-lg mt-4 rounded-pill container px-3 fixed-top">
    <div class="container">
        <a class="navbar-brand" href="user_homepage.php"><img src="assets/logoPulse.png" alt="logo Pulse"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="user_homepage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_profil.php">Profil</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Setting
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
            <button class="btn btn-outline-primary me-2 px-4 py-2 btn-sm rounded-pill"><a href="user_post.php" class="text-decoration-none text-white">Post</a></button>
            <form class="d-flex justify-content-start" action="navbarProcess.php">
                <input class="form-control me-2 px-5 sm py-2 rounded-pill" type="text" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-primary btn-sm rounded-pill px-3 text-white" type="submit">Search</button>
            </form>
            <form action="logout.php" method="POST">
                <button class="btn btn-outline-primary ms-3 btn-sm rounded-pill text-white" type="submit" name="deco"><a href="" class="text-decoration-none text-white" name="sub"><span class="material-symbols-outlined pt-1">
                            logout
                        </span></a></button>
            </form>

        </div>
    </div>
</nav>
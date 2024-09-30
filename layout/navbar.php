<nav id="navbarUser" class="navbar navbar-light navbar-expand-lg mt-4 rounded-pill container px-3 fixed-top d-none d-lg-flex">
    <div class="container">
        <a class="navbar-brand" href="user_homepage.php">
            <img src="assets/logoPulse.png" alt="logo Pulse">
        </a>
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
            </ul>
            <button class="btn btn-outline-primary me-2 px-4 py-2 btn-sm rounded-pill">
                <a href="user_post.php" class="text-decoration-none text-white">Post</a>
            </button>
            <form class="d-flex justify-content-start" action="navbarProcess.php">
                <input class="form-control me-2 px-5 py-2 rounded-pill" type="text" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-primary btn-sm rounded-pill px-3 text-white" type="submit">Search</button>
            </form>
            <form action="logout.php" method="POST">
                <button class="btn btn-outline-primary ms-3 btn-sm rounded-pill text-white" type="submit" name="deco">
                    <span class="material-symbols-outlined pt-1">logout</span>
                </button>
            </form>
        </div>
    </div>
</nav>


<nav id="navbarUserMobile" class="navbar navbar-light fixed-bottom d-lg-none" style="background-color:  #FCEFE6;">
    <div class="container-fluid d-flex justify-content-around">
        <a class="nav-link text-center" href="user_homepage.php">
            <i class="bi bi-house"></i>
            <span class="d-block">Home</span>
        </a>
        <a class="nav-link text-center" href="user_profil.php">
            <i class="bi bi-person"></i>
            <span class="d-block">Profil</span>
        </a>
        <a class="nav-link text-center" href="user_post.php">
            <i class="bi bi-chat-square-heart"></i>
            <span class="d-block">Post</span>
        </a>
        <a id="searchIcon" class="nav-link text-center" href="#">
            <i class="bi bi-search"></i>
            <span class="d-block">Search</span>
        </a>
        <form action="logout.php" method="POST">
            <button class="btn btn-link nav-link text-center p-0">
                <i class="bi bi-box-arrow-right"></i>
                <span class="d-block">Logout</span>
            </button>
        </form>
    </div>
    <div id="searchBarMobile" class="container-fluid mt-2 d-none">
        <form class="d-flex justify-content-center" action="navbarProcess.php">
            <input class="form-control me-2 px-4 py-2 rounded-pill" type="text" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-primary rounded-pill text-white" type="submit">Search</button>
        </form>
    </div>
</nav>
<script>
    // Sélectionner l'icône de recherche et la barre de recherche
    const searchIcon = document.getElementById('searchIcon');
    const searchBarMobile = document.getElementById('searchBarMobile');

    // Ajouter un événement lors du clic sur l'icône
    searchIcon.addEventListener('click', function(e) {
        e.preventDefault(); // Empêcher le comportement par défaut du lien

        // Basculer l'affichage de la barre de recherche
        searchBarMobile.classList.toggle('d-none');
    });
</script>
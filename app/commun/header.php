<!-- header.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php?page=accueil">Site de recettes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= (isset($_GET['page']) && !empty($_GET['page']) && 'accueil' === $_GET['page']) ? 'active' : '' ;?>" aria-current="page" href="index.php?page=accueil">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (isset($_GET['page']) && !empty($_GET['page']) && 'contact' === $_GET['page']) ? 'active' : '' ;?>" href="index.php?page=contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (isset($_GET['page']) && !empty($_GET['page']) && ('connexion' === $_GET['page']) || 'inscription' === $_GET['page']) ? 'active' : '' ;?>" href="index.php?page=connexion">Connexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
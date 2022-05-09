<nav class="nav">
    <?php if (isset($_SESSION["user_is_connect"]) && $_SESSION["user_is_connect"]) {
        echo "<a class='nav-link' href='#'><i class='bi bi-person-circle'></i></a>";
    } ?>
    <a class="nav-link active" aria-current="page" href="/?page=home">Accueil</a>
    <a class="nav-link" href="/?page=article">Articles</a>
    <a class="nav-link" href="/?page=connexion">Connexion</a>
    <a class="nav-link" href="/?page=link">Contact</a>
</nav>
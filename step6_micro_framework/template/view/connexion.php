<?php include_once "../template/template_part/_navbar.php" ?>

<H1>Connexion</H1>
<?php
if (isset($options["responseType"])) {
    if ($options["responseType"] === "error") {
        echo "<div class='alert alert-danger' role='alert'>Identifiant ou mot de passe incorrect</div>";
    }
    if ($options["responseType"] === "success") {
        echo "<div class='alert alert-success' role='alert'>Vous êtes connecté</div>";
    }
}
?>
<div class="row">
    <form method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Nom diutilisateur</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter votre nom diutilisateur" aria-describedby="usernameHelp">
            <div id="usernameHelp" class="form-text">Enter un nom d'utilisateur</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Entrer votre mot de passe">
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
</div>
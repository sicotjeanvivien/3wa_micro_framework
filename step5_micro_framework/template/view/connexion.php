<?php include_once "../template/template_part/_navbar.php" ?>

<h1>CONNEXION</h1>

<?php if (isset($options["responseType"]) && $options["responseType"] === "error") { ?>
    <div class="alert alert-danger" role="alert">Nom d'utilisateur ou mot de passe incorrecte</div>
<?php } ?>
<?php if (isset($options["responseType"]) && $options["responseType"] === "success") { ?>
    <div class="alert alert-success" role="alert">Vous êtes connecté</div>
<?php } ?>

<form method="POST">
    <div class="mb-3">
        <label for="connexion_username" class="form-label">username</label>
        <input type="text" class="form-control" id="connexion_username" name="connexion_username">
    </div>
    <div class="mb-3">
        <label for="connexion_password" class="form-label">password</label>
        <input type="password" class="form-control" id="connexion_password" name="connexion_password">
    </div>
    <input type="submit" class="btn btn-primary" value="connexion">
</form>
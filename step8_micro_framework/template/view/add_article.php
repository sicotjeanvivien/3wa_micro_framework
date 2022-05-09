<?php include_once "../template/template_part/_navbar.php" ?>

<h1>Add_Article</h1>

<?php
if (isset($options["responseType"])) {
    if ($options["responseType"] === "error") {
        echo "<div class='alert alert-danger' role='alert'>Formulaire incorrecte</div>";
    }
    if ($options["responseType"] === "success") {
        echo "<div class='alert alert-success' role='alert'>Votre article a bien été créé.</div>";
    }
}
?>

<?php include_once "../template/template_part/_article_form.php" ?>

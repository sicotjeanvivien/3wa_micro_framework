<?php include_once "../template/template_part/_navbar.php" ?>

<H1>Update_article</H1>

<?php
if (isset($options["responseType"])) {
    if ($options["responseType"] === "error") {
        echo "<div class='alert alert-danger' role='alert'>Erreur lors modification.</div>";
    }
    if ($options["responseType"] === "success") {
        echo "<div class='alert alert-success' role='alert'>L'article a bien été mis à jour.</div>";
    }
}
?>

<?php include_once "../template/template_part/_article_form.php"; ?>


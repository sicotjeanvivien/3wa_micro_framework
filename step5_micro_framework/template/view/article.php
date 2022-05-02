<?php include_once "../template/template_part/_navbar.php" ?>

<H1>Article</H1>

<?php if (isset($_SESSION["user_is_connect"]) && $_SESSION["user_is_connect"]) { ?>
    <a href="/?page=add_article" class="btn btn-primary">Ajouter un article</a>
<?php } ?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Titre</th>
            <th scope="col">Date de publication</th>
            <th scope="col">Content</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($options["articles"])) {
            foreach ($options["articles"] as $key => $article) { ?>
                <tr>
                    <th scope="row"><?php echo $article->getId() ?></th>
                    <td><?php echo $article->getTitle() ?></td>
                    <td><?php echo $article->getPublishedDate() ?></td>
                    <td><?php echo $article->getContent() ?></td>
                </tr>
        <?php  }
        } ?>
    </tbody>
</table>
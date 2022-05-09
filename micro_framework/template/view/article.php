<?php include_once "../template/template_part/_navbar.php" ?>

<H1>Article</H1>

<div class="row">
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Date de publication</th>
                    <th scope="col">Content</th>
                    <th scope="col">Action</th>
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
                            <td>
                                <a class="btn btn-danger" href="/?page=deleted_article&id=<?php echo $article->getId();?>">Supprimer</a> 
                            </td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
    <?php if (isset($_SESSION["user_is_connect"]) && $_SESSION["user_is_connect"]) { ?>
        <div class="col-3">
            <a class="btn btn-secondary" href="/?page=add_article">Ajouter un article</a>
        </div>
    <?php } ?>
</div>
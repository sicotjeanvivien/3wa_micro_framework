<div class="row">
    <form method="POST">
        <div class="mb-3">
            <label for="article_title" class="form-label">article_title</label>
            <input type="text" class="form-control" id="article_title" name="article_title" value="<?php if (isset($options["article"])) echo ($options["article"])->getTitle() ?>">
        </div>
        <div class="mb-3">
            <label for="article_content" class="form-label">article_content</label>
            <textarea class="form-control" id="article_content" name="article_content" rows="10"><?php if (isset($options["article"])) echo ($options["article"])->getContent() ?></textarea>
        </div>
        <?php if (isset($options["article"])) { ?>
            <input type="hidden" name="article_id" value="<?php echo ($options["article"])->getId() ?>">
        <?php } ?>
        <input type="submit" class="btn btn-primary" value="Créer">
    </form>
</div>
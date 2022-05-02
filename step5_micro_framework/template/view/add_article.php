<?php include_once "../template/template_part/_navbar.php" ?>

<h1>Add_article</h1>

<form method="POST">
    <div class="mb-3">
        <label for="article_title" class="form-label">article_title</label>
        <input type="text" class="form-control" id="article_title" name="article_title">
    </div>
    <div class="mb-3">
        <label for="article_content" class="form-label">article_content</label>
        <textarea name="article_content" id="article_content" class="form-control"></textarea>
    </div>
    <input type="submit" class="btn btn-secondary" value="créer">
</form>
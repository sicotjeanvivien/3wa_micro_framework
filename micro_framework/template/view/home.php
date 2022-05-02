<?php include_once "../template/template_part/_navbar.php" ?>

<H1>HELLO WORLD</H1>

<p> Nous somme le
    <?php echo ($options["dateNow"])->format('d-m-Y') ?>
</p>

<?php include "../template/template_part/_carousel.php" ?>
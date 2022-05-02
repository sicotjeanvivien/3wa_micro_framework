<?php
require_once './../lib/controller/Controller.php';

// classe fille HomeController de la classe mére controller permettant de gérer la logique métier
class ArticleController extends Controller
{

    // constructeur initialisant la propriété $path de la classe mére 
    public function __construct()
    {
        parent::__construct("./../template/view/article.php");
    }

}

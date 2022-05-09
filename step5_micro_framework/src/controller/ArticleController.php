<?php
require_once './../lib/controller/Controller.php';
require_once './../src/repository/ArticleRepository.php';
require_once './../src/model/Article.php';

// classe fille LinkController de la classe mére controller permettant de gérer la logique métier
class ArticleController extends Controller
{

    // constructeur initialisant la propriété $path de la classe mére 
    public function __construct()
    {
        parent::__construct("./../template/view/article.php");
    }

    public function index()
    {
        $articleRepository = new ArticleRepository("article");
        $articles = $articleRepository->findAll();
        $this->renderView(["articles" => $articles]);
    }
}

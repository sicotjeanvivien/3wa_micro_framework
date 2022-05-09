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

    public function add()
    {
        $responseType = "";
        if (isset($_SESSION["user_is_connect"]) && $_SESSION["user_is_connect"]) {
            $this->setPath("./../template/view/add_article.php");

            $responseType = "error";
            $article_title =  isset($_POST["article_title"]) ? trim($_POST["article_title"]) :  null;
            $article_content = isset($_POST["article_content"]) ? $article_content = trim($_POST["article_content"]) : null;

            if (
                !empty($article_title)
                && !empty($article_content)
                && strlen($article_title)
                && strlen($article_title) < 257
                && strlen($article_content)
            ) {
                $responseType = "success";
                $article = new Article();
                $article->setTitle($_POST["article_title"]);
                $article->setContent($_POST["article_content"]);
                $article->setPublishedDate((new DateTime("now"))->format("Y-m-d h:i:s"));
                $articleRepository = new ArticleRepository("article");
                $articleRepository->insert($article);
            }
        }
        $this->renderView(["responseType" => $responseType]);
    }

    public function deleted()
    {
        $responseType = "";
        $articleRepository = new ArticleRepository("article");
        if (
            isset($_SESSION["user_is_connect"])
            && $_SESSION["user_is_connect"]
            && isset($_GET["id"])
            ) {
            $responseType = "error";
            if (!empty($article = $articleRepository->find($_GET["id"]))) {
                $articleRepository->deleted($article);
                $responseType = "success";
            }
        }
        $this->renderView([
            "articles" => $articleRepository->findAll(),
            "responseType" => $responseType
        ]);
    }
}

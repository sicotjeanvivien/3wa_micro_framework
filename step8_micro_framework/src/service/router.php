<?php

require_once "../src/controller/HomeController.php";
require_once "../src/controller/ArticleController.php";
require_once "../src/controller/ConnexionController.php";
require_once "../src/controller/LinkController.php";
require_once "../src/controller/Error404Controller.php";

// récupération  du paramètre "page" dans la variable d'environnement $_GET 

// initialisation et déclaration de la variable $page  
$page = NULL;
// Vérification de l'existence de la key "page" dans $_GET
if (array_key_exists("page", $_GET)) $page = $_GET["page"];

// switch/case permettant de rediriger la requète vers le bon Controller
switch ($page) {
    case  'home':
        $home = new HomeController();
        $home->dateNow();
        break;
    case 'article':
        $article = new ArticleController();
        $article->index();
        break;
    case 'add_article':
        $article = new ArticleController();
        $article->add();
        break;
    case 'deleted_article':
        $article = new ArticleController();
        $article->deleted();
        break;
    case 'update_article':
        $article = new ArticleController();
        $article->update();
        break;
    case 'connexion':
        $connexion = new ConnexionController();
        $connexion->index();
        break;
        // Valeur par défaut si la page demandé n'existe pas  
    case 'link':
        $link = new LinkController();
        $link->renderView();
        break;
        // Valeur par défaut si la page demandé n'existe pas  
    default:
        $error = new Error404Controller();
        $error->renderView();
        break;
}

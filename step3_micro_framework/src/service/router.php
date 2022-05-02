<?php

require_once "../src/controller/HomeController.php";
require_once "../src/controller/ArticleController.php";
require_once "../src/controller/LinkController.php";
require_once "../src/controller/Error404Controller.php";

// initialisation et déclaration de la variable $page
$page = NULL;
// // Vérification de l'existence de la key "page" dans $_GET
if (array_key_exists("page", $_GET)) $page = $_GET["page"];

switch ($page) {
    case 'home':
        $home = new HomeController();
        $home->dateNow();
        break;
    
    case 'article':
        $article = new ArticleController();
        $article->renderView();
        break;
    
    case 'link':
        $link = new LinkController();
        $link->renderView();
        break;
    
    default:
        $error = new Error404Controller();
        $error->renderView();
        break;
}


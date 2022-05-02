<?php

require realpath("../src/controller/HomeController.php");
require realpath("../src/controller/LinkController.php");
require realpath("../src/controller/Error404Controller.php");

$page = null;

if (array_key_exists("page", $_GET)) {
    $page = $_GET["page"];
}

switch ($page) {
    case 'home':
        $controller  = new HomeController();
        $controller->renderView();
        break;
        
    case 'link':
        $controller  = new LinkController();
        $controller->renderView();
        break;
        
    default:
        $controller = new Error404Controller();
        $controller->renderView();
        break;
}
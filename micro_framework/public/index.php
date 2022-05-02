<?php

session_start();
// script d'entrée de l'application avec découpe du rendu html 

require '../template/header.php';
require "../src/service/router.php";
require '../template/footer.php';

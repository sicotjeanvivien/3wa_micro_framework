<?php
require_once './../lib/controller/Controller.php';

// classe fille Erro404rController de la classe mére controller permettant de gérer la logique métier
class Error404Controller extends Controller
{

    // constructeur initialisant la propriété $path de la classe mére 
    public function __construct()
    {
        parent::__construct("./../template/error/error404.php");
    }
}

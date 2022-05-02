<?php
require_once './../lib/controller/Controller.php';

// classe fille LinkController de la classe mére controller permettant de gérer la logique métier
class LinkController extends Controller
{

    // constructeur initialisant la propriété $path de la classe mére 
    public function __construct()
    {
        parent::__construct("./../template/link.php");
    }

}

<?php

require_once realpath("./../lib/controller/Controller.php") ;

class HomeController extends Controller
{
    
    public function __construct() {
        parent::__construct("./../template/home.php");
    }

}

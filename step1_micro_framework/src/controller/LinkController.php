<?php

require_once "./../lib/controller/Controller.php" ;

class LinkController extends Controller 
{
    public function __construct() {
        parent::__construct("./../template/link.php");
    }

}

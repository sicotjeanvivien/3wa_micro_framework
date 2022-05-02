<?php
require_once './../lib/controller/Controller.php';
require_once './../src/repository/UserRepository.php';


// classe fille LinkController de la classe mére controller permettant de gérer la logique métier
class ConnexionController extends Controller
{

    // constructeur initialisant la propriété $path de la classe mére 
    public function __construct()
    {
        parent::__construct("./../template/view/connexion.php");
    }

    public function index()
    {
        $responseType = "";
        
        if ( isset($_POST["connexion_username"]) && isset($_POST["connexion_password"])) {
            $responseType = "error";
            $userRepository =  new UserRepository("user");
            $user = $userRepository->findOneByUsername($_POST["connexion_username"]);
            if (!empty($user) && password_verify($_POST["connexion_password"], $user->getPassword())) {
                    $responseType = "success";
                    $_SESSION['user_is_connect'] = true;
            }
        }

        $this->renderView(["responseType" => $responseType]);
    }

}

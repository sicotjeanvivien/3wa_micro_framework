Création d'un micro frameWork

#########################
#   ETAPE 1  ROUTER     #
#########################

===> Création d'un router permettant de gérer l'affichage de plusieur pages.
    Indication : 
        --> utiliser des "require_once" 
        - Créez un nouveau répertoire "micro_framework" avec cette structure : 
            -> lib
                -> controller
                    ->Controller.php
            -> public 
                -> index.php
            -> src
                -> Controller
                -> Model
                -> service
                    -> router.php
            -> template
                -> hearder.php
                -> footer.php
        - dans le fichier public/index.php faire le require de template/header.php, src\service\router.php et template/footer.php
        - Dans le fichier hearder.php, rajouter le template html de base de la balise "<!DOCTYPE html>" jusqu'à la balise "<body>". Ajouter boostrap (cdn du css link); 
        - Dans le fichier footer.php, rajouter le template html de base de la balise "</body>" jusqu'à la balise "</html>". Ajouter le js de bootstraap (script)
        - Créer un fichier home.php dans le répertoire \template avec une balise "<H1>HELLO WORLD</H1>" . Ajouter une nav bar soit perso soit de bootstrap. écrire 3 lien "<a>" dans la navbar ["home", "link", "about"].
        - créer un fichier error404.php dans le répertoire \template avec une balise "<H1>ERROR 404</H1>"

===> création de la classe abstrait "controller.php"
        
        Propriété : $path  private / string
        méthode :
            __construct($path)
                - méthode constructeur
                - cette méthode récupère le chemin du fichier de vue correspondant
            
            renderView()
                -  require selon le chemin donnée lors de l'intanciation

===> création de la classe fille "\src\controller\HomeController.php". La classe HomeController hérite de la classe Controller
    Méthode : 
        __construct() :
            Qui déclare la variable $path avec le chemin du template home.php de la classe mére ( parent::__construct())

===> création de la classe fille "\src\controller\Error404Controller.php". La classe Error404Controller hérite de la classe Controller
    Méthode : 
        __construct() :
            Qui déclare la variable $path avec le chemin du template error404.php de la classe mére ( parent::__construct())
    - Le routing se fonde sur un paramètre `GET` : `page`. Une route ressemblera par exemple à ceci : `http://localhost/index.php?page=home`.
    - Créer dans le fichier "src\service\router.php" un switch/case permettant de récuper le paramètre page ($_GET['page']) pour choisir le bon controller appelant après instanciation la méthode renderView()
    - créer la route LINK.

   TESTER => ajouter des pages tester des trucs



#########################
#   ETAPE 2 - Variable  #
######################### 

    - Dans ..\lib\controller\Controller.php, 
    - Rajouter un paramétre array "options"  valeur par défaut ["error404" => "Page not found"]
    - Afficher sur template/error404.php la valeur $options[error404]
    - afficher la date du jour sur la page home
    - Créer dans la class HomeController une nouvelle méthode renderViewWithDateNow() qui prend en paramètre la date du jour et renvoie en paramètre ["date" => $date->format('d-m-Y')] dans la méthode renderView.



#########################
#   ETAPE 3 - View      #
######################### 

===> Réorganisation des view
    -déplacer les scripts "template/home.php" et "template/link.php" dans le répertoire /template/view 
    -déplacer les scripts "template/error404.php" dans le répertoir /template/error
    -créer le fichier /template/template_part/_navbar.php
    -Attention : penser à modifier les chemins dans les "require_once"
    -dans le script /template/template_part/_navbar.php, déplacer la balise <nav>...</nav> qui est dans le script /template/view/home.php
    -dans les scripts /template/view/home.php et /template/view/link.php, ajouter un "include_once" permettant de faire un lien avec /template/template_part/_navbar.php

===> Créer un carousel dans le fichier /template/template_part/_carousel.php
    -utiliser le carousel bootstrap
    -récupérer 3 images minimun https://pixabay.com/fr/
    -placer les images dans le répertoire /public/asset/image
    -exemple:<img src="/asset/image/..." class="d-block w-100" alt="...">
    -afficher le carousel sur la page home

===>modifier le backgroud-color
    -créer le fichier /public/asset/css/main.css
    -Ajouter <link> pour le css dans le <header>
    -mettre le backgroud-color du body en "#BADA55"

===> Création d'une nouvelle page article
    -supprimer le lien "about" de la navbar
    -créer la page "Article" avec la navbar, la view, le controller, la route


#########################
#   ETAPE 4 - Model     #
######################### 

===> Prérequis 
    -créer la base de donnée "micro_framework" dans MySql utilisé phpMyAdmin
    -récupérer le script Repository.php et le placer dans /lib/repository
    -modifier les informations ("DATABASE_NAME", "DATABASE_USERNAME", "DATABASE_PASSWORD") de connection du script /lib/repository/Repository.php selon vos spec


===> Création du model Article
    -créer le classe /src/model/Article.php

        Propriété : 
            -> private int id
            -> private string content
            -> private string title
            -> private string publishedDate

        Méthode : 
            -> __construct(int $id, string $content, string $title, string $publishedDate):
            -> GETTER - SETTER  exemple :
            # public function getId(): int
            # {
            #     return $this->id;
            # }
        
            # public function setId(int $id): void
            # {
            #     $this->id = $id;
            # } 
    -créer la classe /src/repository/ArticleRepository.php fille de la classe /lib/repository/Repository.php
        
        Constantes : 
            -> CONST ARTICLE_TABLE : la requete permettant de créer la table article penser à utiliser "IF NOT EXISTS"
                -id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
                -content TEXT NOT NULL,
                -title VARCHAR(255),
                -published_date DATETIME
                aide : https://www.sqlite.org/lang_createtable.html
        
            -> CONST ARTICLE_INSERT : la requete permettant d'inserer les premiéres données dans la base 
                exemple : INSERT INTO table_name(colunm_name1, colunm_name2,...) VALUE(VALUE11, VALUE12), (VALUE21, VALUE22),...;
                aide : https://www.sqlite.org/lang_insert.html

        Propriété : 
            -> private string $table;

        Méthode : 
            -> __construct(string $table) : 
                -qui initiale la propriété $table avec le paramétre string $table
            
            -> findAll():array
                -execute la méthode createTableIfNotExistes(string $table, string $tableQuery, string $insretQuery) de la classe mére
                -une variable $query requete SLQ pour récuper toutes les lignes de la table "article" ("SELECT*")
                -utiliser la méthode executeQuery( string $query) pour récupérer toutes les lignes de la table sous la forme d'un tableau
                -instancier chaque ligne du tableau du tableau avec la classe Article ("foreach", "new Article" ). Sous la forme [article1, article2, article3,...]
                -retourner le résultat
    
    -Dans le contrôler ArticleController.php, créer la méthode index.php qui servira de renderView dans le router.php
        -récupérer la liste des articles :
            -instanciation de la classe ArticleRepository
            -utilisation de la méthode findAll
            -injection de $articles dans la page de rendu de "article.php"
    
    -Créer un tableau <table> dans la page article.php pour afficher les articles
    -th "Id", "Titre"," Date de publication","Content"
    -Ne pas utilisé Bootstrap
    -Stylisé le tableau
    -Stilisé la navbar



#########################
#   ETAPE 5 - Auth      #
######################### 

indication: 
    username : admin
    password : admin

==> Initialiser la session
    -Ajouter la fonction session_start() au début du fichier /public/index.php 

==> création d'un symtem d'authentification
    -dans /view/connexion.php : 
        ->ajouter la navbar /template/template_part/_navbar.php
        ->une balise <h1> avec comme texte "CONNEXION"
        ->créer un formulaire (method="POST") de connexion : 
                ->un input "nom d'utilisateur" (type="text" id="username" name="username")
                ->un input "mot de passe" (type="password" id="password" name="password")
                ->un input "se connecter" (type="submit")
        -> implémenter une balise qui séaffiche si l'utilisateur se connecte avec succes et une balise erreur si il y a une erreur de connexion (voir bootstrap-> alerts)

==>Créer le controller ConnexionController 
    -créer la méthode index() qui renvoie la vue par la méthode this->renderView() (penser à la remplacer dans le router) 

==> créer la classe /src/model/User.php
        Propriété : 
            -> private int id
            -> private string username
            -> private string password
            -> private string publishedDate

        Méthode : 
            -> GETTER - SETTER

==> Créer la classe fille /src/model/UserRepository.php héritant de la classe mère /lib/repository/Repository.php
    Constante: 
        -> PRIVATE CONST  USER_TABLE: la requete permettant de créer la table article penser à utiliser "IF NOT EXISTS"
            id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
            username TEXT NOT NULL,
            password VARCHAR(255)
            aide : https://www.sqlite.org/lang_createtable.html
        
        -> PRIVATE CONST USER_INSERT = "INSERT INTO user(username, password) VALUES(
            'admin',
            '$2y$10\$B7e9Vf30Su7dMDrrKn8.TuUPLI2XJtPkvPLllbPaORN2hzYMQPQp.'
        );";

     Méthode : 
        -> __construct(string $table) : 
            -qui initiale la propriété $table avec le paramétre string $table 
        
        -> findOneByUsername(string $username): User
            -execute la méthode createTableIfNotExistes(string $table, string $tableQuery, string $insretQuery) de la classe mére
            -une variable $query requete SLQ pour récuper toutes les lignes de la table "user" ("SELECT*")
            -utiliser la méthode executeQuery( string $query) pour récupérer la ligne de la table limité à 1 et filtrer par le username 
            -retourner un seul et unique model User ($result->fetchAll(PDO::FETCH_CLASS, "user")[0])

==> Dans le ConnexionController
    -Récupérer les données passées en post via la variable globale $_POST
    -Récupérer l'utilisateur courant en utilisant la méthode UserRepository::findOneByUsername()
    -si l'utilisateur existe, 
        -comparer le mot de passe ($_POST["password"]) et le hash($user->getPassword()) avec la fonction "password_verify(string $password, string $hash): bool"
        -ajouter la clé/valeur  $_SESSION['user_is_connect'] = true;
    -si l'utilisateur n'existe pas, 
        -renvoyer un code erreur sous forme de tableau 

==>Indiquer à l'utilisateur qu'il est connecter 
    -ajouter un élément dans la nav qui apparait seulement si $_SESSION['user_is_connect'] === true (exemple icon user)


#############################
#   ETAPE 6 - Form Article  #
#############################

==>Création d'une page réservé au admin
        -créer une page /view/add_artcile.php dont l'accès est limité à l'administrateur permettant d'ajouter des artciles dans la BDD (base de données)
  

################################
#   ETAPE 7 - Deleted Article  #
################################

==> Création d'un bouton de suppression d'un article
        - créer un bouton permettant de supprimer un article. Penser à vérifier que l'article existe. L'utilisateur doit être connecté.  


################################
#   ETAPE 8 - Update  Article  #
################################

==> Création d'une page pour la modification d'un article  /view/update_artcile.php
    -créer une page dont l'accès est limité à l'administrateur permettant de modifier un article  existant dans la base de données. Créer un bouton d'accés pour chaque article sur la page /template/view/article.php
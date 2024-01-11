<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/Models/Database.php'; 

use App\Controllers\HomeController;
use App\Controllers\DashboardController;
use App\Controllers\Authentification;
use App\Controllers\CategorieController;
use App\Controllers\TagController;
use App\Controllers\StatistiqueController;
use App\Controllers\WikiController;


$database = new Database();
$conn = $database->getConnection();   

$route = isset($_GET['route']) ? $_GET['route'] : 'home';

switch ($route) {
        case 'home':
                $controller = new HomeController();
                $controller->index();
                break;
        case 'fetchMoreUsers':
                $controller = new HomeController();
                $controller->fetchMoreUsers();
                break;
        case 'register':
                $authentification = new Authentification($conn);
                $authentification->register();
                break;

        case 'login':
                $authentification = new Authentification($conn);
                $authentification->login();
                break;
         case 'logout':
                $authentification = new Authentification($conn);
                $authentification->logout();
                break;
        
        case 'updateCategorie':
                $CategorieController = new CategorieController();
                $CategorieController->updateCategorie();
                break;       
        case 'addCategorie':
                $CategorieController = new CategorieController();
                $CategorieController->addCategorie();
                break;
        case 'deleteCategorie':
                $CategorieController = new CategorieController();
                $CategorieController->deleteCategorie();
                break;
        case 'addTag':
                $TagController = new TagController();
                $TagController->addTag();
                break;
        case 'deleteTag':
                $TagController = new TagController();
                $TagController->deleteTag();
                break;
        case 'updateTag':
                $TagController = new TagController();
                $TagController->updateTag();
                break; 
        case 'dashboard':
                $DashboardController = new DashboardController();
                $DashboardController->index();
                break;
        case 'tags':
                $ContactController = new TagController();
                $ContactController->tags();
                break;
        case 'categorie':
                $CategorieController = new CategorieController();
                $CategorieController->categorie();
                break;
        case 'statistique':
                $statistiqueController = new StatistiqueController();
                $statistiqueController->statistique();
                break;  
        case 'wiki':
                $wikiController = new WikiController();
                $wikiController->wikis();
                break; 
        case 'addwiki':
                $wikiController = new WikiController();
                $wikiController->addwiki();
                break; 
        case 'updatewiki':
                $wikiController = new WikiController();
                $wikiController->updatewiki();
                break; 
        case 'deletewiki':
                $wikiController = new WikiController();
                $wikiController->deletewiki();
                break; 
        default:
                // Handle 404 or redirect to the default route
                header('HTTP/1.0 404 Not Found');
                exit('Page not found');
}

// Execute the controller action

?>
<?php
session_start();
require_once  __DIR__  .'/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\DashboardController;
use App\Controllers\AddCategorieController;
use App\Controllers\AddTagsController;
use App\Controllers\CategorieController;
use App\Controllers\EditCategorieController;
use App\Controllers\EditTagController;
use App\Controllers\RegisterController;
use App\Controllers\TagController;

$route = isset($_GET['route']) ? $_GET['route'] : 'home';

// Instantiate the controller based on the route
switch ($route) {
    case 'home':
            $controller = new HomeController();
            $controller->index();
            break;
    case 'fetchMoreUsers':
            $controller = new HomeController();
            $controller->fetchMoreUsers();
            break;
//     case 'register':
//             $logincontroller = new LoginController();
//             $logincontroller->registerUrl();
//             break;
//     case 'login':
//             $logincontroller = new LoginController();
//             $logincontroller->login();
//             break;
//    
//     case 'logout':
//             $logoutcontroller = new LogoutController();
//             $logoutcontroller->logout();
//             break;
//     case 'showAllArticles':
//             $articlecontroller = new ArticleController();
//             $articlecontroller->showAllArticles();
//             break; 
//     case 'deleteArticle':
//             $deletearticlecontroller = new DeleteArticleController();
//             $deletearticlecontroller->DeleteArticleController();
//             break;
//     case 'search':
//             $searchcontroller = new SearchController();
//             $searchcontroller->search();
//             break;
    case 'register':
            $registercontroller = new RegisterController();
            $registercontroller->register();
            break;
    case 'login':
            $logincontroller = new LoginController();
            $logincontroller->login();
            break;
    case 'editTag':
            $edittagcontroller = new TagController();
            $edittagcontroller->editTag();
            break;
    case 'editCategorie':
            $CategorieController = new CategorieController();
            $CategorieController->editCategorie();
            break;
    case 'addCategorie':
            $CategorieController = new CategorieController();
            $CategorieController->addCategorie();
            break;
    case 'addTag':
             $TagController = new TagController();
             $TagController->addTag();
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
             
//    case 'statistique':
//              $statistiqueController = new StatistiqueController();
//              $statistiqueController->index();
//              break;  


            
    // Add more cases for other routes as needed    
    default:
        // Handle 404 or redirect to the default route
        header('HTTP/1.0 404 Not Found');
        exit('Page not found');
}

// Execute the controller action

?>

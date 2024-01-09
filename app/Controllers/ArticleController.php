<?php
namespace App\Controllers;
use App\Models\Job;
 use App\Models\Database;

class ArticleController
{
    
    public function showAllArticles()
    {
        $conns = new Database();
        $conn=$conns->getConnection();
        // Initialise le modèle
        $jobModel = new Job();

        // Récupère tous les articles
        $articles = $jobModel->getAllRows();

        // Charge la vue avec les articles
        require(__DIR__ .'../../../view/article.php') ;
    }
}


?>

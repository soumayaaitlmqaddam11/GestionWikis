<?php

namespace App\Controllers;

use App\Models\WikiModel;
use App\Models\TagModel;
use App\Models\DetailsModel;
use App\Models\CategorieModel;


class WikiController
{
    public function wikis()
{
    $wikiModel = new WikiModel();
    $wikis = $wikiModel->getAllWikisWithCategories();

    $tagModel = new TagModel();
    $tags = $tagModel->getAllTags();

    require(__DIR__ . '/../../view/wiki.php');
}
    

public function addwiki()
{
    $categorieModel = new CategorieModel();
    $categories = $categorieModel->getAllCategories();

    $tagModel = new TagModel();
    $tags = $tagModel->getAllTags();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titre = htmlspecialchars($_POST['titre']);
        $contenu = htmlspecialchars($_POST['contenu']);
        $id_categorie = htmlspecialchars($_POST['id_categorie']);
        $tag_ids = isset($_POST['tag_ids']) ? $_POST['tag_ids'] : [];

        $wikiModel = new WikiModel();
        $wikiId = $wikiModel->addwiki($titre, $contenu, $id_categorie);

        if ($wikiId) {
            $detailsModel = new DetailsModel();
            $detailsModel->addTagsToWiki($wikiId, $tag_ids);
            
            echo "Le wiki a été ajouté avec succès.";
        } else {
            echo "Erreur lors de l'ajout du wiki.";
        }
    } else {
        require(__DIR__ . '/../../view/addwiki.php');
    }
}

public function editwiki()
{
    $wikiId = isset($_GET['id']) ? $_GET['id'] : null;

    if (!$wikiId) {
        echo "ID du wiki non spécifié.";
        return;
    }

    $wikiModel = new WikiModel();
    $wiki = $wikiModel->getWikiById($wikiId);

    if (!$wiki) {
        echo "Le wiki avec l'ID spécifié n'existe pas.";
        return;
    }

    $categorieModel = new CategorieModel();
    $categories = $categorieModel->getAllCategories();

    $tagModel = new TagModel();
    $tags = $tagModel->getAllTags();

    require(__DIR__ . '/../../view/editwiki.php');
}



    public function updatewiki()
    {
        $wikiId = isset($_GET['id']) ? $_GET['id'] : null;

        // Récupérez les informations du wiki depuis votre modèle
        $wikiModel = new WikiModel();
        $wiki = $wikiModel->getWikiById($wikiId); // Assurez-vous d'implémenter cette méthode dans votre modèle
    
        // Récupérez les catégories et tags
        $categorieModel = new CategorieModel();
        $categories = $categorieModel->getAllCategories();
    
        $tagModel = new TagModel();
        $tags = $tagModel->getAllTags();

        require(__DIR__ . '/../../view/editwiki.php');
    }

   public function deletewiki()
{
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $wikiId = isset($_GET['id']) ? $_GET['id'] : null;

        if ($wikiId) {
            $wikiModel = new WikiModel();
            $deleted = $wikiModel->deletewiki($wikiId);

            if ($deleted) {
                header("Location: index.php?route=wiki");
                exit();
            
                  }

        }
    }
    }
    }
?>

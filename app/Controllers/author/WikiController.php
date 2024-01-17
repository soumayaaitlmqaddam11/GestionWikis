<?php

namespace App\Controllers\Author;

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

    require(__DIR__ . '/../../../view/wiki.php');
}
    

public function addwiki()
{
    $categorieModel = new CategorieModel();
    $categories = $categorieModel->getAllCategories();

    $tagModel = new TagModel();
    $tags = $tagModel->getAllTags();
    $author = isset($_SESSION['id']) ? $_SESSION['id'] :'';
  

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titre = htmlspecialchars($_POST['titre']);
        $contenu = htmlspecialchars($_POST['contenu']);
        $id_categorie = htmlspecialchars($_POST['id_categorie']);
        $tag_ids = isset($_POST['tag_ids']) ? $_POST['tag_ids'] : [];
      

        $wikiModel = new WikiModel();
        $wikiId = $wikiModel->addwiki($titre, $contenu, $id_categorie,$author);

        if ($wikiId) {
            $detailsModel = new DetailsModel();
            $detailsModel->addTagsToWiki($wikiId, $tag_ids);
            
            echo "Le wiki a été ajouté avec succès.";
        } else {
            echo "Erreur lors de l'ajout du wiki.";
        }
    } else {
        require(__DIR__ . '/../../../view/addwiki.php');
        
    }
}
    public function updatewiki()
    {

       $wikiId = isset($_GET['id']) ? $_GET['id'] : null;
       
       $wikiModel = new WikiModel();
        $wiki = $wikiModel->getWikiById($wikiId); 
       
    
       
        $categorieModel = new CategorieModel();
        $categories = $categorieModel->getAllCategories();
    
        $tagModel = new TagModel();
        $tags = $tagModel->getAllTags($_GET['id']);
        $tages = $tagModel->getAllTags();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = htmlspecialchars($_POST['titre']);
            $contenu = htmlspecialchars($_POST['contenu']);
            $id_categorie = htmlspecialchars($_POST['id_categorie']);
            $tag_ids = isset($_POST['tag_ids']) ? $_POST['tag_ids'] : [];

            $wikiModel->updatewiki($wikiId, $titre, $contenu, $id_categorie);
            header('Location: ?route=wiki');
        }    
        

        require(__DIR__ . '/../../../view/editwiki.php');
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
    public function statistique() {
        require(__DIR__ .'../../../view/statistique.php');
    }
    public function hom()
    {
        $wikiModel = new WikiModel();
        $wikis = $wikiModel->getAllWikisWithCategories();
    
        require(__DIR__ . '/../../view/hom.php');
    }
    
    }
?>

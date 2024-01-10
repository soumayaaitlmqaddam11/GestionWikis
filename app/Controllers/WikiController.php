<?php
namespace App\Controllers;

use App\Models\WikiModel;

class WikiController
{
    public function wikis() {
        require(__DIR__ .'../../../view/wiki.php');
    }
    public function addwiki() {
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $titre=htmlspecialchars($_POST['titre']);
            $contenu=htmlspecialchars($_POST['contenu']);
            $categorie=htmlspecialchars($_POST['id_categorie']);
            $tag=htmlspecialchars($_POST['id_tag']);
            $wikiModel=new WikiModel();
            $wikiModel->addwiki($titre,$contenu,$categorie,$tag);
            echo "La catégorie a été ajoutée avec succès.";
        }else {
      
    require(__DIR__ .'../../../view/addWiki.php');
}
}
    
        
    public function editwiki() {
        require(__DIR__ .'../../../view/editwiki.php');
    }
}

?>
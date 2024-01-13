<?php 
namespace App\Controllers\Admin;
use App\Models\WikiModel;
use App\Models\TagModel;
use App\Models\DetailsModel;
use App\Models\CategorieModel;
class WikiArciveController{

public function archive(){
    $wikiModel = new WikiModel();
    $wikis = $wikiModel->getAllWikisWithCategories();

    $tagModel = new TagModel();
    $tags = $tagModel->getAllTags();
    require(__DIR__ .'/../../../view/wikiarchive.php');

}

public function archiveitem(){
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }
        $model = new WikiModel();
        $model->archive($id);
        header('Location:index.php?route=wikiarchive');
    
}

}



?>
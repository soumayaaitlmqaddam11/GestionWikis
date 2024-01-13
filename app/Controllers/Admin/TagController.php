<?php
namespace App\Controllers\Admin;
use App\Models\TagModel;

class TagController
{
    public function tags() {
        require(__DIR__ .'/../../../view/tags.php');
    }
    public function showAllTags()
    {
        $tagModel = new TagModel();
        $tags = $tagModel->getAllTags();
        return $tags;
    }
    public function addTag() {
        
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
                $nom = htmlspecialchars($_POST['nom']);
                $tagModel = new TagModel();
                $tagModel->addTag($nom);
                echo "La catégorie a été ajoutée avec succès.";
            }else {
            } 
        require(__DIR__ .'/../../../view/addTag.php');}
    }
   
    public function deleteTag()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            $tagModel = new TagModel();
            $tagModel->deleteTag($id);
            header("Location: index.php?route=tags");
            exit();
        } else {
        }
    }
    public function updateTag(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            $nom = $_POST['nom'];
            $tagModel = new TagModel(); 
            $tagModel->editTag($id,$nom);
            header("location: ?route=tags");
        }elseif(isset($_GET['id'])){
            $id = htmlspecialchars($_GET['id']);
            $tagModel = new TagModel();
            $tag = $tagModel->getTagById($id); 
        } require(__DIR__ . '/../../../view/editTag.php');
    }
    }
    

?>
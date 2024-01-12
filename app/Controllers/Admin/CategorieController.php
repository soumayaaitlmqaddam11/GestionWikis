<?php

namespace App\Controllers\Admin;


use App\Models\CategorieModel;

class CategorieController
{
    public function categorie()
    {
        require(__DIR__ . '/../../../view/categorie.php');
    }
    
    public function showAllCategories()
    {
        $categorieModel = new CategorieModel();
        $categories = $categorieModel->getAllCategories();
        return $categories;
    }
    

    public function addCategorie()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nom = htmlspecialchars($_POST['nom']);
            $categorieModel = new CategorieModel();
            $categorieModel->addCategorie($nom);
            echo "La catégorie a été ajoutée avec succès.";
        } else {

            require_once(__DIR__ . '/../../view/addCategorie.php');
        }
    }


    public function updateCategorie(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            $nom = $_POST['nom'];
            $categorieModel = new CategorieModel(); 
            $categorieModel->editCategorie($id,$nom);
            header("location: ?route=categorie");
        }elseif(isset($_GET['id'])){
            $id = htmlspecialchars($_GET['id']);
            $categorieModel = new CategorieModel();
            $category = $categorieModel->getCategoryById($id); 
        } require(__DIR__ . '/../../view/editCategorie.php');
    }
    public function deleteCategorie()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            $categorieModel = new CategorieModel();
            $categorieModel->deleteCategorie($id);
            header("Location: index.php?route=categorie");
            exit();
        } else {
        }
    }

}
?>
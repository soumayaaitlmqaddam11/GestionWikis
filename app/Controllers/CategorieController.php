<?php

namespace App\Controllers;

class CategorieController
{
    public function categorie() {
        require(__DIR__ .'../../../view/categorie.php');
    }
    public function addCategorie() {
        require(__DIR__ .'../../../view/addCategorie.php');
    }
    public function editCategorie() {
        require(__DIR__ .'../../../view/editCategorie.php');
        
    }
    }
    

?>
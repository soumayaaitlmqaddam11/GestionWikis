<?php
namespace App\Controllers;

class TagController
{
    public function tags() {
        require(__DIR__ .'../../../view/tags.php');
    }
    public function addTag() {
        require(__DIR__ .'../../../view/addTag.php');
    }
    public function editTag() {
        require(__DIR__ .'../../../view/editTag.php');
    }
    }
    

?>
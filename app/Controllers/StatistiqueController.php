<?php
namespace App\Controllers;
use App\Models\TagModel;

class StatistiqueController
{
    public function statistique() {
        require(__DIR__ .'../../../view/statistique.php');
    }
  
}
?>
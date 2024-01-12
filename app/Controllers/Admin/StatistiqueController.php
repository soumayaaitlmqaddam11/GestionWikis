<?php
namespace App\Controllers\Admin;

use App\Models\WikiModel;
use App\Models\TagModel;
use App\Models\CategorieModel;

class StatistiqueController
{
    public function statistique()
    {
        $wikiModel = new WikiModel();
        $totalWikis = $wikiModel->getTotalWikis();
        $tagModel = new TagModel();
        $categorieModel = new CategorieModel();

        $totalTags = $tagModel->getTotalTags();
        $totalCategories = $categorieModel->getTotalCategories();

        require(__DIR__ . '/../../../view/statistique.php');

    }
}
?>
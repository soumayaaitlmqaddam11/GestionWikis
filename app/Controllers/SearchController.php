<?php

namespace App\Controllers;

use App\Models\SearchModel;
use App\Models\WikiModel;

class SearchController
{
    private $search;

    public function __construct()
    {
        $this->search = new SearchModel();
    }

    public function search()
    {
        $searchTerm = null;

  
        if (isset($_POST['title']) || isset($_POST['categorie']) || isset($_POST['tag'])) {
            $searchTerm = isset($_POST['title']) ? $_POST['title'] : (isset($_POST['categorie']) ? $_POST['categorie'] : (isset($_POST['tag']) ? $_POST['tag'] : null));
        }
        if ($searchTerm !== null) {
            $wikis = $this->search->search($searchTerm);
        }

        require(__DIR__ . '../../../view/search.php');
    }
}

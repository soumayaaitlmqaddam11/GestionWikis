<?php

namespace App\Controllers;

use SearchModel;

class SearchController
{
    private $search;

    public function __construct()
    {
        $this->search = new SearchModel();
    }

    public function search()
    {
        if (isset($_GET["wiki"]) || isset($_GET["categorie"]) || isset($_GET["tag"])) {
            $result = $this->search->search($_GET["wiki"], $_GET["categorie"], $_GET["tag"]);
            echo json_encode($result);
        }
    }
}
?>

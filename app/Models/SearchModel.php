<?php
namespace App\Models;
use PDO;
USE App\Models\Database;
class SearchModel {
    private $pdo;

    public function __construct() {
     
        $con = new \Database;
        $this ->pdo = $con->getConnection();
    }

    public function search($searchTerm)
    {
        $stmt = "SELECT *,categorie.nom AS categorie FROM details JOIN wiki ON details.id_wiki=wiki.id 
        JOIN categorie ON wiki.id_categorie = categorie.id
        join tag ON details.id_tag=tag.id
        WHERE titre LIKE  '%$searchTerm%' or categorie.nom like '%$searchTerm%' or tag.nom like '%$searchTerm%' ";
        $result = $this->pdo->query($stmt);

        $searchResults = [];
        
        while ($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
            $searchResults[] = $row;
        }

        return $searchResults;
    }
}
?>

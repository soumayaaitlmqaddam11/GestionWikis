<?php
namespace App\Models;
use PDO;
class SearchModel {
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=wikis", "root", "");
    }

 

    public function search($searchTerm)
    {
        $stmt = "SELECT * FROM wiki WHERE titre LIKE  '%$searchTerm%' ";
        $result = $this->pdo->query($stmt);

        $searchResults = [];
        
        while ($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
            $searchResults[] = $row;
        }

        return $searchResults;
    }
}
?>

<?php

class SearchModel {
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=wikis", "root", "");
    }

    public function search($wiki, $categorie, $tag) {
        $stmt = $this->pdo->prepare("SELECT * FROM jobs WHERE title LIKE :wiki AND company LIKE :categorie AND location LIKE :tag");
        
        $stmt->bindValue(':wiki', '%' . $wiki . '%', PDO::PARAM_STR);
        $stmt->bindValue(':categorie', '%' . $categorie . '%', PDO::PARAM_STR);
        $stmt->bindValue(':tag', '%' . $tag . '%', PDO::PARAM_STR);

        $stmt->execute();

        $getalph = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $getalph;
    }
}
?>

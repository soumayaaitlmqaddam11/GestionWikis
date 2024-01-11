<?php

namespace App\Models;

use PDO;

class WikiModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=wikis", "root", "");
    }

    public function getAllWikisWithCategories()
    {
        $query = "SELECT wiki.id, wiki.titre, wiki.contenu, categorie.nom AS categorie, wiki.id_categorie
                  FROM wiki
                  JOIN categorie ON wiki.id_categorie = categorie.id
                  ORDER BY wiki.id ASC";
    
        $result = $this->pdo->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function getWikiById($id)
    {
        $query = "SELECT * FROM wiki WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addwiki($titre, $contenu, $id_categorie)
    {
        $stmt = $this->pdo->prepare("INSERT INTO wiki (titre, contenu, id_categorie) VALUES (:titre, :contenu, :id_categorie)");
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->bindParam(':id_categorie', $id_categorie);
        $stmt->execute();

        return $this->pdo->lastInsertId();
    }

    public function updatewiki($id, $titre, $contenu, $id_categorie)
    {
        $stmt = $this->pdo->prepare("UPDATE wiki SET titre = :titre, contenu = :contenu, id_categorie = :id_categorie WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->bindParam(':id_categorie', $id_categorie);
        return $stmt->execute();
    }

    public function deletewiki($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM wiki WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

}

?>

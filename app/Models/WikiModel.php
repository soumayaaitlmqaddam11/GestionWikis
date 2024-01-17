<?php

namespace App\Models;
USE App\Models\Database;

use PDO;
use PDOException;

class WikiModel
{
    private $pdo;

    public function __construct()
    {
        $con = new \Database;
        $this ->pdo = $con->getConnection();
    }

    public function getAllWikisWithCategories()
    {
        $query = "SELECT wiki.id, wiki.titre, wiki.contenu, categorie.nom AS categorie, wiki.id_categorie
                  FROM wiki
                  JOIN categorie ON wiki.id_categorie = categorie.id
                  ORDER BY wiki.id ASC";
    
        $result = $this->pdo->query($query);
    
        if (!$result) {
            var_dump($this->pdo->errorInfo());
            die("Error executing query");
        }
    
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    
    

    public function getWikiById($id)
    {
        
        $query = "SELECT *,categorie.nom AS categorie FROM details JOIN wiki ON details.id_wiki=wiki.id 
        JOIN categorie ON wiki.id_categorie = categorie.id
        join tag ON details.id_tag=tag.id 
        join utilisateur on wiki.id_utilisateur=utilisateur.id WHERE wiki.id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addwiki($titre, $contenu, $id_categorie,$author)

    {
     
        $stmt = $this->pdo->prepare("INSERT INTO wiki (titre, contenu, id_categorie, id_utilisateur) VALUES (:titre, :contenu, :id_categorie, :id_utilisateur)");
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->bindParam(':id_categorie', $id_categorie);
        $stmt->bindParam(':id_utilisateur', $author);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }

    public function updatewiki($id, $titre, $contenu, $id_categorie)
    {
        try {
            error_log("id: $id, titre: $titre, contenu: $contenu");
    
            $stmt = $this->pdo->prepare("UPDATE wiki SET titre = :titre, contenu = :contenu WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':contenu', $contenu);
           
    
            if ($stmt->execute()) {
                return true;
            } else {
                print_r($stmt->errorInfo());
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
    
    
    
    public function deletewiki($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM wiki WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    public function getTotalWikis()
    {
        $query = "SELECT COUNT(*) as total FROM wiki";
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result['total'];
    }


    public function archive($id) {
        $sql="UPDATE wiki SET archived=1 where id=$id";
        $stmt = $this->pdo->query($sql);
        
    }

}

?>

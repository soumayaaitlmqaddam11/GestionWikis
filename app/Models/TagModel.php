<?php

namespace App\Models;

use PDO;

class TagModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=wikis", "root", "");
    }

    public function getAllTags()
    {
        $query = $this->pdo->query("SELECT * FROM tag");
        $tags = $query->fetchAll(PDO::FETCH_ASSOC);    
        return $tags;
    }
    

    public function addTag($nom)
    {
        $stmt = $this->pdo->prepare("INSERT INTO tag (nom) VALUES (:nom)");
        $stmt->bindParam(':nom', $nom);
        $stmt->execute();
    }

    public function deleteTag($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM tag WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
public function getTagById($id)
{
    $stmt = $this->pdo->prepare("SELECT * FROM tag WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
public function editTag($id, $nom)
{
    $stmt = $this->pdo->prepare("UPDATE tag SET nom = :nom WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nom', $nom);
    
   
    return $stmt->execute();
}
public function getTotalTags()
{
    $query = "SELECT COUNT(*) as total FROM tag";
    $statement = $this->pdo->prepare($query);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}
public function getTagsByWikiId($wikiId)
{
    $query = "SELECT tag.nom FROM tag
              JOIN details ON tag.id = details.id_tag
              WHERE details.id_wiki = :wiki_id";

    $stmt = $this->pdo->prepare($query);
    $stmt->bindParam(':wiki_id', $wikiId);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}
?>

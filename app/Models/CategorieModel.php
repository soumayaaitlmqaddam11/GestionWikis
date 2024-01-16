<?php

namespace App\Models;

use PDO;
USE App\Models\Database;
class CategorieModel
{
    private $pdo;

    public function __construct()
    {
    
$con = new \Database;
$this ->pdo = $con->getConnection();
    }

    public function getAllCategories()
    {
        $query = $this->pdo->query("SELECT * FROM categorie");
        $categories = $query->fetchAll(PDO::FETCH_ASSOC);    
        return $categories;
    }
    

    public function addCategorie($nom)
    {
        $stmt = $this->pdo->prepare("INSERT INTO categorie (nom) VALUES (:nom)");
        $stmt->bindParam(':nom', $nom);
        $stmt->execute();
    }

    public function deleteCategorie($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM categorie WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
public function getCategoryById($id)
{
    $stmt = $this->pdo->prepare("SELECT * FROM categorie WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
public function editCategorie($id, $nom)
{
    $stmt = $this->pdo->prepare("UPDATE categorie SET nom = :nom WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nom', $nom);
    
   
    return $stmt->execute();
}

public function getTotalCategories()
{
    $query = "SELECT COUNT(*) as total FROM categorie";
    $statement = $this->pdo->prepare($query);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

}
?>

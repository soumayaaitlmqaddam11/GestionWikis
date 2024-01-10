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
  public function editWiki(){
    
  }
  public function addWiki($titre,$contenu,$categorie,$tag)
    {
        $stmt = $this->pdo->prepare("INSERT INTO tag (titre,contenu,) VALUES (:nom,)");
        $stmt->bindParam(':nom', $nom);
        $stmt->execute();
    }
}
?>

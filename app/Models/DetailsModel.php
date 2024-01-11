<?php
namespace App\Models;
use PDO;

class DetailsModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=wikis", "root", "");
    }

    public function addTagsToWiki($wikiId, $tagIds)
    {
        foreach ($tagIds as $tagId) {
            $stmt = $this->pdo->prepare("INSERT INTO details (id_wiki, id_tag) VALUES (:id_wiki, :id_tag)");
            $stmt->bindParam(':id_wiki', $wikiId);
            $stmt->bindParam(':id_tag', $tagId);
            $stmt->execute();
        }
    }
    public function updateTagsForWiki($wikiId, $tagIds)
    {
        // Supprimer tous les tags existants associés au wiki
        $stmtDelete = $this->pdo->prepare("DELETE FROM details  WHERE id_wiki = :id_wiki");
        $stmtDelete->bindParam(':id_wiki', $wikiId);
        $stmtDelete->execute();

        // Insérer les nouveaux tags associés au wiki
        $stmtInsert = $this->pdo->prepare("INSERT INTO details (id_wiki, id_tag) VALUES (:id_wiki, :id_tag)");
        $stmtInsert->bindParam(':id_wiki', $wikiId);

        foreach ($tagIds as $tagId) {
            $stmtInsert->bindParam(':id_tag', $tagId);
            $stmtInsert->execute();
        }
    }
}
?>
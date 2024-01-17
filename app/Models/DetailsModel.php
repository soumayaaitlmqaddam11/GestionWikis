<?php
namespace App\Models;
use PDO;
USE App\Models\Database;


class DetailsModel
{
    private $pdo;

    public function __construct()
    {
        $con = new \Database;
        $this ->pdo = $con->getConnection();
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
      
        $stmtDelete = $this->pdo->prepare("DELETE FROM details  WHERE id_wiki = :id_wiki");
        $stmtDelete->bindParam(':id_wiki', $wikiId);
        $stmtDelete->execute();

        $stmtInsert = $this->pdo->prepare("INSERT INTO details (id_wiki, id_tag) VALUES (:id_wiki, :id_tag)");
        $stmtInsert->bindParam(':id_wiki', $wikiId);

        foreach ($tagIds as $tagId) {
            $stmtInsert->bindParam(':id_tag', $tagId);
            $stmtInsert->execute();
        }
    }
}
?>

<?php
namespace App\Controllers;
use App\Models\WikiModel;


class Wiki_detailController
{
    public $wiki;

    public function __construct()
    {
        $this->wiki = new WikiModel();
    }
    public function wiki_detail() {
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $wikis=$this->wiki->getWikiById($id);
        
            require(__DIR__ .'/../../view/wiki_detail.php');
        }
      

        
    }
    }
    

?>
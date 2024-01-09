<?php


namespace App\Controllers;

use App\Models\UserModel;

class Authentification
{
    public $userModel;

    public function __construct(\PDO $conn)
    {
        $this->userModel = new UserModel($conn);
    }
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            if (empty($email) || empty($password)) {
                echo 'Email ou mot de passe requis';
            } else {
               
              
                if ($this->userModel->loginUser($email, $password)) {
                    // $_SESSION['id']= $user['id'];
                    // $_SESSION['email']=$user['email'];
                    // $_SESSION['password']=$user['password'];
                    header("location:index.php?route=categorie");
                } else {
                    echo 'Échec de la connexion. Veuillez vérifier votre email et votre mot de passe.';
                } 
            }
        } else {
            require(__DIR__ . '../../../view/login.php');
        }
    }
    

        
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $this->userModel->registerUser($nom, $email, $password);
            header("location:index.php?route=login");
     
        } else {
            require(__DIR__ . '../../../view/register.php');
        }
    }
    public function logout(){
        session_destroy();
        header("location:index.php?route=login");
    }
    

}
    
    

?>
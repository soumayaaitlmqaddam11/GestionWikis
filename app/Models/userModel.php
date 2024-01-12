<?php

namespace App\Models;

use PDO;

class UserModel
{
    public $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function registerUser($nom, $email, $password)
    {
        $stmt = $this->conn->prepare("INSERT INTO utilisateur (nom, email, password) VALUES (?, ?, ?)");
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->execute([$nom, $email, $hashedPassword]);
    }

    public function loginUser($email, $password)
    {
        $stmt = $this->conn->prepare("SELECT * FROM utilisateur WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role']; 
            return true;
        } else {
            return false;
        }
    }
    public function logoutUser(){
        session_unset();
        session_destroy();
        header("location:index.php?route=login");
        exit;
    }
    
}

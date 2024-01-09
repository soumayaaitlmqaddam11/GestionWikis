<?php
namespace App\Models;
class User{
    private $conn;
    private $db;
    private $table_name = "users";
    public $id;
    public $username;
    public $email;
    public $password;
    public $role_name;
    public function __constract($id, $username, $email, $password, $role_name){
           $this->id=$id;
           $this->username=$username;
           $this->email=$email;
           $this->password=$password;
           $this->role_name=$role_name; 
    }

    public function __construct()
    {
        // Get an instance of the Database class
        $this->db = Database::getInstance();
        $this->conn = $this->db->getConnection();
    }
    public function getId(){
        return $this->id;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getRole_name(){
        return $this->role_name;
    }
    public function setId($id){
        $this->id=$id;
    }
    public function setUsername($username){
        $this->username=$username;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function setPassword($password){
        $this->password=$password;
    }
    public function setRole_name($role_name){
        $this->role_name=$role_name;
    }
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET username=?, email=?, password=?, role_name=?";
        $stmt = $this->conn->prepare($query);

        $stmt->bind_param("ssss", $this->username, $this->email, $this->password, $this->role_name);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
    
}





?>
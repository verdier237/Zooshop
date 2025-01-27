<?php
class Connexion
{

    public $conn;
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private  $database = "zooshop";
    public function __construct()
    {
        // Connexion à la base de données

        try {
            $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        } catch (Exception $e) {
            echo "Connection failed: " . $e->getMessage() . "<br>";
        }
    }
}

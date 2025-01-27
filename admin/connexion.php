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
            // set the PDO error mode to exception

            echo " Base de donnée Connected successfully <br>";
        } catch (Exception $e) {
            echo "Connection failed: " . $e->getMessage() . "<br>";
        }
    }
}

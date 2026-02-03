<?php
// app/Core/Database.php
namespace App\Core;

use PDO;
use PDOException;

// Database Class

class Database{
    private $connection = null;
    private $host;
    private $username;
    private $dbname;
    private $password;
    private $charset;

    // Constructor
    public function __construct(array $config){
        $this->host = $config['host'];
        $this->dbname = $config['dbname'];
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->charset = $config['charset'] ?? 'utf8mb4';
    }

    // Establish Database Connection
    public function connect(){
        // if connection is already exist, then return 
        if($this->connection !== null){
            return $this->connection;
        }

        try {
            // DSN (Data Secure Name)
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}";


            // PDO Options for security and error handling
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // for Exceptions throw
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Associate Array return
                PDO::ATTR_EMULATE_PREPARES => false // Real prepared statements 
            ];

            // create connection
            $this->connection = new PDO($dsn , $this->username, $this->password, $options);

            return $this->connection;

        } catch (PDOException $e) {
            // if connection fail , then show error message
            die("Database Connection Failed: ". $e->getMessage());
        }
    }

    // Connection Close
    public function disconnect(){
        $this->connection = null;
    }

    // Return Current Connection
    public function getConnection(){
        return $this->connection;
    }
}
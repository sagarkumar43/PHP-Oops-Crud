<?php
namespace App\Core;

use PDO;

// Base Model Class

class Model {
    protected $db;
    protected $table;

    // Constructor - Inject Database Connection ( Dependency Injection )
    public function __construct(Database $database){
        $this->db = $database->connect();
    }

    // Select All Records
    public function all(){
        $query = "SELECT * FROM {$this->table} ORDER BY id DESC";
        $stmt = $this->db-prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Select - Single record by ID
    public function find($id){
        $query = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Insert - new record
    public function create(array $data){
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        $query = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";
        $stmt = $this->db->prepare($query);

        // Bind Paremeters
        foreach($data as $key => $value){
            $stmt->bindValue(":{$key}", $value);
        }
        return $stmt->execute();
    }

    // Update - existing record
    public function update($id, array $data){
        $setClauses = [];

        foreach(array_keys($data) as $columns){
            $setClauses[] = "{$columns} = :{$columns}";
        }
        $setString = implode(', ', $setClauses);

        $query = "UPDATE {$this->table} SET {$setString} WHERE id = :id";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        foreach($data as $key => $value){
            $stmt->bindValue(":{$key}", $value);
        }
        $stmt->execute();
    }

    // Delete 
    public function delete($id){
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PARAM_INT);
        return $stmt->execute();
    }

    // Custom Query Execute
    protected function query($query, $params = []){
        $stmt = $this->db->prepare($query);

        foreach($params as $key => $value){
            $stmt->bindValue($key, $value);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Last Inserted ID
    public function lastInsertedId(){
        return $this->db->lastInsertedId();
    }
}
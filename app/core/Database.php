<?php

trait Database
{
    private static $instance;
    private $connection;

    private function __construct()
    {
        $dsn = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
        try {
            $this->connection = new PDO($dsn, DBUSER, DBPASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    // Singleton pattern to ensure only one instance of Database exists
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Return the PDO connection object
    public function getConnection()
    {
        return $this->connection;
    }

    // Query method to fetch all results
    public function query($query, $data = [])
    {
        try {
            $con = $this->getConnection();
            $stm = $con->prepare($query);
            $stm->execute($data);
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            return $result ?: false;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    // Query method to fetch a single row
    public function get_row($query, $data = [])
    {
        try {
            $con = $this->getConnection();
            $stm = $con->prepare($query);
            $stm->execute($data);
            $result = $stm->fetch(PDO::FETCH_OBJ);
            return $result ?: false;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    // Insert data into a table
    public function insert($table, $data)
    {
        if (empty($data)) {
            die("No data to insert!");
        }

        $columns = implode(", ", array_keys($data)); // Get column names (keys of $data)
        $placeholders = implode(", ", array_fill(0, count($data), "?")); // Create placeholders for values

        $query = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";

        try {
            $con = $this->getConnection();
            $stm = $con->prepare($query);
            return $stm->execute(array_values($data)); // Execute with the values from the array
        } catch (PDOException $e) {
            die("Insert failed: " . $e->getMessage());
        }
    }

    // Update data in a table
    public function update($table, $data, $condition, $conditionData = [])
    {
        $columns = implode(", ", array_map(fn($key) => "{$key} = ?", array_keys($data)));
        $query = "UPDATE {$table} SET {$columns} WHERE {$condition}";

        try {
            $con = $this->getConnection();
            $stm = $con->prepare($query);
            return $stm->execute(array_merge(array_values($data), $conditionData));
        } catch (PDOException $e) {
            die("Update failed: " . $e->getMessage());
        }
    }

    // Delete data from a table
    public function delete($table, $condition, $conditionData = [])
    {
        $query = "DELETE FROM {$table} WHERE {$condition}";

        try {
            $con = $this->getConnection();
            $stm = $con->prepare($query);
            return $stm->execute($conditionData);
        } catch (PDOException $e) {
            die("Delete failed: " . $e->getMessage());
        }
    }
}

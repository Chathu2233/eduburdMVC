<?php

/**
 * Main Model trait for handling database interactions
 */
trait Database
{
    /**
     * Establish a connection to the database.
     * 
     * @return PDO The database connection object.
     */
    protected function connect()
    {
        $dsn = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
        try {
            $con = new PDO($dsn, DBUSER, DBPASS);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    /**
     * Execute a database query and return the results as an array of objects.
     * 
     * @param string $query The SQL query to execute.
     * @param array $data Parameters for prepared statements.
     * @return array|false The result set or false if no results found.
     */
    public function query($query, $data = [])
    {
        try {
            $con = $this->connect();
            $stm = $con->prepare($query);
            $stm->execute($data);

            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            return $result ?: false;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    /**
     * Execute a database query and return a single row as an object.
     * 
     * @param string $query The SQL query to execute.
     * @param array $data Parameters for prepared statements.
     * @return object|false The single row result or false if not found.
     */
    public function get_row($query, $data = [])
    {
        try {
            $con = $this->connect();
            $stm = $con->prepare($query);
            $stm->execute($data);

            $result = $stm->fetch(PDO::FETCH_OBJ);
            return $result ?: false;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    /**
     * Insert data into a table.
     * 
     * @param string $table The name of the table.
     * @param array $data An associative array of column-value pairs.
     * @return bool True on success, false otherwise.
     */
    public function insert($table, $data)
    {
        if (empty($data)) {
            die("No data to insert!");
        }

        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));

        $query = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";

        try {
            $con = $this->connect();
            $stm = $con->prepare($query);
            return $stm->execute(array_values($data));
        } catch (PDOException $e) {
            die("Insert failed: " . $e->getMessage());
        }
    }

    /**
     * Update data in a table.
     * 
     * @param string $table The name of the table.
     * @param array $data An associative array of column-value pairs.
     * @param string $condition The WHERE clause condition.
     * @param array $conditionData Parameters for the WHERE clause.
     * @return bool True on success, false otherwise.
     */
    public function update($table, $data, $condition, $conditionData = [])
    {
        $columns = implode(", ", array_map(fn($key) => "{$key} = ?", array_keys($data)));
        $query = "UPDATE {$table} SET {$columns} WHERE {$condition}";

        try {
            $con = $this->connect();
            $stm = $con->prepare($query);
            return $stm->execute(array_merge(array_values($data), $conditionData));
        } catch (PDOException $e) {
            die("Update failed: " . $e->getMessage());
        }
    }

    /**
     * Delete data from a table.
     * 
     * @param string $table The name of the table.
     * @param string $condition The WHERE clause condition.
     * @param array $conditionData Parameters for the WHERE clause.
     * @return bool True on success, false otherwise.
     */
    public function delete($table, $condition, $conditionData = [])
    {
        $query = "DELETE FROM {$table} WHERE {$condition}";

        try {
            $con = $this->connect();
            $stm = $con->prepare($query);
            return $stm->execute($conditionData);
        } catch (PDOException $e) {
            die("Delete failed: " . $e->getMessage());
        }
    }
}

/**
 * Main Model class for handling database interactions
 */
trait Model
{
    use Database;

    protected $table;
    protected $limit = 10;
    protected $offset = 0;
    protected $order_type = "desc";
    protected $order_column = "id";
    public $errors = [];
    protected $allowedColumns = [];

    public function findAll()
    {
        $query = "SELECT * FROM $this->table ORDER BY $this->order_column $this->order_type LIMIT $this->limit OFFSET $this->offset";
        return $this->query($query);
    }

    public function where($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key) {
            $query .= "$key = :$key AND ";
        }

        foreach ($keys_not as $key) {
            $query .= "$key != :$key AND ";
        }

        $query = rtrim($query, " AND ") . " ORDER BY $this->order_column $this->order_type LIMIT $this->limit OFFSET $this->offset";
        $data = array_merge($data, $data_not);
        return $this->query($query, $data);
    }

    public function first($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key) {
            $query .= "$key = :$key AND ";
        }

        foreach ($keys_not as $key) {
            $query .= "$key != :$key AND ";
        }

        $query = rtrim($query, " AND ") . " LIMIT $this->limit OFFSET $this->offset";
        $data = array_merge($data, $data_not);
        $result = $this->query($query, $data);
        return $result ? $result[0] : false;
    }

    public function insert($data)
    {
        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }

        $keys = array_keys($data);
        $query = "INSERT INTO $this->table (" . implode(",", $keys) . ") VALUES (:" . implode(",:", $keys) . ")";
        return $this->query($query, $data);
    }

    public function update($id, $data, $id_column = 'id')
    {
        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }

        $keys = array_keys($data);
        $query = "UPDATE $this->table SET ";

        foreach ($keys as $key) {
            $query .= "$key = :$key, ";
        }

        $query = rtrim($query, ", ") . " WHERE $id_column = :$id_column";
        $data[$id_column] = $id;

        return $this->query($query, $data);
    }

    public function delete($id, $id_column = 'id')
    {
        $data[$id_column] = $id;
        $query = "DELETE FROM $this->table WHERE $id_column = :$id_column";
        return $this->query($query, $data);
    }
}

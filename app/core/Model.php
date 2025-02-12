<?php

/**
 * Main Model trait for handling database interactions
 */
Trait Model
{
    use Database;

    protected $table;               // Database table name
    protected $limit = 10;           // Default number of records per query
    protected $offset = 0;           // Default offset for pagination
    protected $order_type = "desc";  // Default ordering direction
    protected $order_column = "id"; // Default column for ordering
    public $errors = [];             // Holds validation or error messages
    protected $allowedColumns = [];  // Allowed columns for insert and update

    /**
     * Retrieve all records from the table
     *
     * @return array|false
     */
    public function findAll()
    {
        $query = "SELECT * FROM $this->table ORDER BY $this->order_column $this->order_type LIMIT $this->limit OFFSET $this->offset";
        return $this->query($query);
    }

    /**
     * Retrieve records based on specific conditions
     *
     * @param array $data Conditions for the WHERE clause
     * @param array $data_not Conditions for the NOT WHERE clause
     * @return array|false
     */
    public function where($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";

        // Adding "AND" conditions for matching keys
        foreach ($keys as $key) {
            $query .= "$key = :$key AND ";
        }

        // Adding "AND" conditions for non-matching keys
        foreach ($keys_not as $key) {
            $query .= "$key != :$key AND ";
        }

        // Removing the trailing "AND" and adding ORDER BY and LIMIT
        $query = rtrim($query, " AND ") . " ORDER BY $this->order_column $this->order_type LIMIT $this->limit OFFSET $this->offset";

        $data = array_merge($data, $data_not);
        return $this->query($query, $data);
    }

    /**
     * Retrieve the first record that matches the conditions
     *
     * @param array $data Conditions for the WHERE clause
     * @param array $data_not Conditions for the NOT WHERE clause
     * @return object|false
     */
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

    /**
     * Insert a new record into the table
     *
     * @param array $data Data to insert
     * @return bool
     */
    public function insert($data)
    {
        // Remove unwanted columns
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

    /**
     * Update an existing record by ID
     *
     * @param int $id The ID of the record to update
     * @param array $data Data to update
     * @param string $id_column The column to use for the WHERE clause
     * @return bool
     */
    public function update($id, $data, $id_column = 'id')
    {
        // Remove unwanted columns
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

    /**
     * Delete a record by ID
     *
     * @param int $id The ID of the record to delete
     * @param string $id_column The column to use for the WHERE clause
     * @return bool
     */
    public function delete($id, $id_column = 'id')
    {
        $data[$id_column] = $id;
        $query = "DELETE FROM $this->table WHERE $id_column = :$id_column";
        return $this->query($query, $data);
    }
}

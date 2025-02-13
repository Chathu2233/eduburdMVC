<?php

class StudentModel {
    use Database; // Include the trait

    public function saveStudent($userId) {
        try {
            // Prepare the data to insert (only user_id and nic for parent table)
            $data = [
                'user_id' => $userId, // Reference to the user table
            ];
    
            // Call insert function
            if ($this->insert('student', $data)) {
                return true;
            } else {
                return false;
            }
    
        } catch (PDOException $e) {
            die("Insert failed: " . $e->getMessage());
        }
    }
}
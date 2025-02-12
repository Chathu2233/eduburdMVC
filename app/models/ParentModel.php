<?php

class ParentModel {
    use Database; // Include the trait

    public function saveParent($userId, $nic) {
        try {
            // Prepare the data to insert (only user_id and nic for parent table)
            $data = [
                'user_id' => $userId, // Reference to the user table
                'nic' => $nic
            ];

            // Call insert function to insert parent data
            if ($this->insert('parent', $data)) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            die("Insert failed: " . $e->getMessage());
        }
    }
}





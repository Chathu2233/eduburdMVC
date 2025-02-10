<?php

class Student {
    use Database; // ✅ Include the trait

    public function saveStudent($firstName, $lastName, $contactNumber, $email, $dob, $password, $userId) {
        try {
            // Prepare the data to insert
            $data = [
                'first_name' => $firstName,
                'last_name' => $lastName,
                'contact_number' => $contactNumber,
                'email' => $email,
                'dob' => $dob,
                'password' => $password,
                'user_id' => $userId // ✅ Ensure foreign key is added
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

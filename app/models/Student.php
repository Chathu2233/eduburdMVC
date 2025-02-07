<?php

class Student {
    use Database; // ✅ Include the trait

    public function saveStudent($firstName, $lastName, $contactNumber, $email, $dob, $password) {
        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO student (first_name, last_name, contact_number, email, dob, password) 
                      VALUES (:firstName, :lastName, :contactNumber, :email, :dob, :password)";

            $data = [
                ':firstName' => $firstName,
                ':lastName' => $lastName,
                ':contactNumber' => $contactNumber,
                ':email' => $email,
                ':dob' => $dob,
                ':password' => $hashedPassword
            ];

            return $this->query($query, $data);
        } catch (PDOException $e) {
            return false;
        }
    }
}

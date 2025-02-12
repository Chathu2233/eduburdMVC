<?php

class Student {

    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function saveStudent($userId, $firstName, $lastName, $contactNumber, $email, $dob) {
        try {
            $query = "INSERT INTO student (user_id, first_name, last_name, contact_number, email, dob)
                      VALUES (:userId, :firstName, :lastName, :contactNumber, :email, :dob)";
            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':firstName', $firstName);
            $stmt->bindParam(':lastName', $lastName);
            $stmt->bindParam(':contactNumber', $contactNumber);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':dob', $dob);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error in saveStudent: " . $e->getMessage());
            return false;
        }
    }
}

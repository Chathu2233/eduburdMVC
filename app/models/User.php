<?php

class User {

    private $db;

    public function __construct() {
        $this->db = new class {
            use Database; // Use the Database trait inside an anonymous class
        };
    }

    public function registerUser($role, $firstName, $lastName, $email, $contactNumber, $dob, $password) {
        try {
            $query = "INSERT INTO user (role, first_name, last_name, email, contact_number, dob, password) 
                      VALUES (:role, :firstName, :lastName, :email, :contactNumber, :dob, :password)";
            $stmt = $this->db->connect()->prepare($query); // Use the connect() method to get PDO instance

            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':firstName', $firstName);
            $stmt->bindParam(':lastName', $lastName);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':contactNumber', $contactNumber);
            $stmt->bindParam(':dob', $dob);
            $stmt->bindParam(':password', $password);

            $stmt->execute();

            // Return the last inserted user id
            return $this->db->connect()->lastInsertId();
        } catch (PDOException $e) {
            error_log("Error in registerUser: " . $e->getMessage());
            return false;
        }
    }

    public function getUserByEmail($email) {
        try {
            $query = "SELECT * FROM user WHERE email = :email LIMIT 1";
            $stmt = $this->db->connect()->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error in getUserByEmail: " . $e->getMessage());
            return false;
        }
    }
}

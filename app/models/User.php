<?php

require_once __DIR__ . '/../core/Database.php';

class User {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance();
    }

    public function registerUser($user_role, $first_name, $last_name, $email, $contact_no, $dob, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            return false; // Email already exists
        }

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->pdo->prepare("INSERT INTO user (user_role, first_name, last_name, email, contact_no, dob, password) 
                                     VALUES (?, ?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$user_role, $first_name, $last_name, $email, $contact_no, $dob, $hashed_password])) {
            return $this->pdo->lastInsertId();
        }

        return false;
    }
}

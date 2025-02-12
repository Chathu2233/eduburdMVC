<?php

require_once __DIR__ . '/../core/Database.php';

class User {
    use Database; // Use the trait instead of instantiating it

    private $pdo;

    public function __construct() {
        $this->pdo = $this->connect(); // Call the trait's `connect()` method
    }

    // Register a new user
    public function registerUser($role, $first_name, $last_name, $email, $contact_no, $dob, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            return false; // Email already exists
        }

        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Insert the user data into the `user` table
        $stmt = $this->pdo->prepare("INSERT INTO user (user_role, first_name, last_name, email, dob, contact_no, password) 
        VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        if ($stmt->execute([$role, $first_name, $last_name, $email, $dob, $contact_no, $hashed_password])) {
            return $this->pdo->lastInsertId(); // Return the user ID if insertion is successful
        }

        return false; // Return false if insertion fails
    }

    // Get user details by email
    public function getUserByEmail($email) {
        $query = "SELECT * FROM user WHERE email = :email LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Login a user
    public function loginUser($email, $password) {
        $user = $this->getUserByEmail($email);
        
        if ($user) {
            if (password_verify($password, $user['password'])) {
                return $user; // Successful login
            }
        }
        
        return false; // Failed login
    }
}

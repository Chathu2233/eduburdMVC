<?php

require_once __DIR__ . '/../core/Database.php';

class User {
    use Database; // 🔥 Use the trait instead of instantiating it

    private $pdo;

    public function __construct() {
        $this->pdo = $this->connect(); // 🔥 Call the trait's `connect()` method
    }

    public function registerUser($user_role, $first_name, $last_name, $email, $contact_no, $dob, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            return false; // Email already exists
        }

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
       // Insert the user data into the `user` table
    $stmt = $this->pdo->prepare("INSERT INTO user (role, first_name, last_name, email, password, created_at, updated_at) 
    VALUES (?, ?, ?, ?, ?, NOW(), NOW())");
   if ($stmt->execute([$role, $first_name, $last_name, $email, $hashed_password])) {
   // Return the user_id after successful insertion
    return $this->pdo->lastInsertId();
}

        return false;
    }

    public function getUserByEmail($email) {
        $query = "SELECT * FROM user WHERE email = :email LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
    

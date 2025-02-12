<?php

<<<<<<< HEAD
class Tutor
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function isEmailExists($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function registerUser($user_role, $first_name, $last_name, $email, $contact_no, $dob, $password)
    {
        $stmt = $this->pdo->prepare("INSERT INTO user (user_role, first_name, last_name, email, contact_no, dob, password) 
                                     VALUES (:user_role, :first_name, :last_name, :email, :contact_no, :dob, :password)");
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':contact_no', $contact_no);
        $stmt->bindParam(':dob', $dob);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':user_role', $user_role);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }

    public function registerTutor($user_id, $years_of_experience, $cv_upload_path)
    {
        $stmt = $this->pdo->prepare("INSERT INTO tutor (user_id, years_of_experience, cv) 
                                     VALUES (:user_id, :years_of_experience, :cv)");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':years_of_experience', $years_of_experience);
        $stmt->bindParam(':cv', $cv_upload_path);
        $stmt->execute();
    }
}
=======
class TutorModel {
    use Database; // Include the trait

    public function saveTutor($userId, $YearsofExperience,  $UploadYourCV) {
        try {
            // Prepare the data to insert (only user_id ,YearsofExperience,  ,UploadYourCV tutor table)
            $data = [
                'user_id' => $userId, // Reference to the user table
                'years_of_experience' => $YearsofExperience,
                'cv' => $UploadYourCV,
            ];

            // Call insert function to insert tutor data
            if ($this->insert('tutor', $data)) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            die("Insert failed: " . $e->getMessage());
        }
    }
}


>>>>>>> sajidha

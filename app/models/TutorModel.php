<?php

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



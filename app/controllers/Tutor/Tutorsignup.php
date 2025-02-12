<?php

class TutorSignup {

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleSignup();
        } else {
            // Load the signup form view
            include '../app/views/tutor/tutorsignup.view.php';
        }
    }

    private function handleSignup() {
        // Retrieve data from the POST request
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $contactNumber = $_POST['contactNumber'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $password = $_POST['password'];
        $reEnterPassword = $_POST['reEnterPassword'];
        $YearsofExperience = $_POST['YearsofExperience'];
    
        // Handle file upload for CV
        if (isset($_FILES['UploadYourCV']) && $_FILES['UploadYourCV']['error'] == 0) {
            $cvTmpName = $_FILES['UploadYourCV']['tmp_name'];
            $cvName = $_FILES['UploadYourCV']['name'];
            $cvPath = '../app/views/tutor/uploads/' . $cvName;  // Save the uploaded file in the 'uploads/cvs' directory
    
            // Move the uploaded CV to the desired location
            move_uploaded_file($cvTmpName, $cvPath);
        } else {
            // Handle error or missing file
            $cvPath = null;  // Or set to a default if required
        }

        // Validate form data
        if ($password !== $reEnterPassword) {
            $error_message = 'Passwords do not match!';
            include '../app/views/tutor/tutorsignup.view.php';
            return;
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // First, insert user into `user` table
        $userModel = new User();
        $userId = $userModel->registerUser('tutor', $firstName, $lastName, $email, $contactNumber, $dob, $hashedPassword);

        if (!$userId) {
            $error_message = 'Error creating user account!';
            include '../app/views/tutor/tutorsignup.view.php';
            return;
        }

        // Now, insert tutor using `user_id`
        $tutorModel = new TutorModel();
        if ($tutorModel->saveTutor($userId, $YearsofExperience, $cvPath)) {
            // Redirect to login page after successful signup
            header('Location: ' . ROOT . '/login');
            exit();
        } else {
            $error_message = 'There was an error saving your information. Please try again!';
            include '../app/views/tutor/tutorsignup.view.php';
        }
    }
}

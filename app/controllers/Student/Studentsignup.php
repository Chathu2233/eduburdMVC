<?php

class StudentSignup {

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleSignup();
        } else {
            // Load the signup form view
            include '../app/views/student/studentsignup.view.php';
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

        // Validate form data
        if ($password !== $reEnterPassword) {
            $error_message = 'Passwords do not match!';
            include '../app/views/student/studentsignup.view.php';
            return;
        }

        // Secure hashing (Uncomment below for security)
        // $password = password_hash($password, PASSWORD_BCRYPT);

        // ✅ First, insert user into `user` table
        $userModel = new User();
        $userId = $userModel->registerUser('student', $firstName, $lastName, $email, $contactNumber, $dob, $password); // Adjust as per your `user` table

        if (!$userId) {
            // Log the error to see if the user insertion failed
            error_log("Failed to create user for email: " . $email);
            $error_message = 'Error creating user account!';
            include '../app/views/student/studentsignup.view.php';
            return;
        }

        // ✅ Now, insert student using `user_id`
        $studentModel = new Student();
        if ($studentModel->saveStudent($firstName, $lastName, $contactNumber, $email, $dob, $password, $userId)) { 
            // Redirect to login page after successful signup
            header('Location: ' . ROOT . '/login');
            exit();
        } else {
            $error_message = 'There was an error saving your information. Please try again!';
            include '../app/views/student/studentsignup.view.php';
        }
    }
}

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

        // Secure hashing
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert user data
        $userModel = new User();
        $userId = $userModel->registerUser('student', $firstName, $lastName, $email, $contactNumber, $dob, $hashedPassword);

        if (!$userId) {
            $error_message = 'Error creating user account!';
            include '../app/views/student/studentsignup.view.php';
            return;
        }

        // Insert student data
        $studentModel = new Student();
        $isStudentSaved = $studentModel->saveStudent($userId, $firstName, $lastName, $contactNumber, $email, $dob);

        if ($isStudentSaved) {
            // Redirect to login after successful signup
            header('Location: ' . ROOT . '/login');
            exit();
        } else {
            $error_message = 'There was an error saving your information. Please try again!';
            include '../app/views/student/studentsignup.view.php';
        }
    }
}

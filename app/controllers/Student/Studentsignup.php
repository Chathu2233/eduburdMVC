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

        // Create an instance of the Student model and save the data
        $studentModel = new Student();
        if ($studentModel->saveStudent($firstName, $lastName, $contactNumber, $email, $dob, $password)) {
            // Redirect to login page or dashboard after successful signup
            header('Location: ' . ROOT . '/login');
            exit();
        } else {
            $error_message = 'There was an error saving your information. Please try again!';
            include '../app/views/student/studentsignup.view.php';
        }
    }
}

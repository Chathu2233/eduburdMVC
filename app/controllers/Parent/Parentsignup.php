<?php

class ParentSignup {

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleSignup();
        } else {
            // Load the signup form view
            include '../app/views/parent/parentsignup.view.php';
        }
    }

    private function handleSignup() {
        // Retrieve data from the POST request
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $contactNumber = $_POST['contactNumber'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $nic = $_POST['nic'];
        $password = $_POST['password'];
        $reEnterPassword = $_POST['reEnterPassword'];

        // Validate form data
        if ($password !== $reEnterPassword) {
            $error_message = 'Passwords do not match!';
            include '../app/views/parent/parentsignup.view.php';
            return;
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // First, insert user into `user` table
        $userModel = new User();
        $userId = $userModel->registerUser('parent', $firstName, $lastName, $email, $contactNumber, $dob, $hashedPassword);

        if (!$userId) {
            $error_message = 'Error creating user account!';
            include '../app/views/parent/parentsignup.view.php';
            return;
        }

        // Now, insert parent using `user_id`
        $parentModel = new ParentModel();
        if ($parentModel->saveParent($userId, $nic)) {
            // Redirect to login page after successful signup
            header('Location: ' . ROOT . '/login');
            exit();
        } else {
            $error_message = 'There was an error saving your information. Please try again!';
            include '../app/views/parent/parentsignup.view.php';
        }
    }
}

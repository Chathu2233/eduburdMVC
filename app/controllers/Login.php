<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class Login {

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleLogin();
        } else {
            // Show the login view
            include '../app/views/login.view.php';
        }
    }

    private function handleLogin() {
        // Retrieve data from the POST request
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Create an instance of the User model and check login credentials
        $userModel = new User();

        $user = $userModel->getUserByEmail($email);

        $response = [];

        if ($user) {
            // Verify password
            if (password_verify($password, $user['password'])) {
                // Start session and store user data (logged-in session)
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role']; // Store role for access control

                
                // Respond with success
                $response['status'] = 'success';
                $response['message'] = 'Login successful!';
                echo json_encode($response);
                exit();
            } else {
                // Invalid password
                $response['status'] = 'error';
                $response['message'] = 'Invalid credentials!';
                echo json_encode($response);
                exit();
            }
        } else {
            // User not found
            $response['status'] = 'error';
            $response['message'] = 'User does not exist!';
            echo json_encode($response);
            exit();
        }
    }
}


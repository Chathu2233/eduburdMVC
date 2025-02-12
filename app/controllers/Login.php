<?php

class Login {

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->authenticate();
        } else {
            include '../app/views/login.view.php';
        }
    }

    private function authenticate() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Check if user exists and validate password
        $userModel = new User();
        $user = $userModel->getUserByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['role'] = $user['role'];

            // Redirect to homepage or dashboard
            header('Location: ' . ROOT . '/home');
            exit();
        } else {
            $error_message = 'Invalid email or password!';
            include '../app/views/login.view.php';
        }
    }
}

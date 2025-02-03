<?php

session_start();
require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../../models/User.php';

class Studentsignup extends Controller {
    
    public function index() {
        $this->view('student/studentsignup.view');
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_role = 'student';
            $first_name = $_POST['firstName'];
            $last_name = $_POST['lastName'];
            $email = $_POST['email'];
            $contact_no = $_POST['contactNumber'];
            $dob = $_POST['dob'];
            $password = $_POST['password'];
            $re_password = $_POST['reEnterPassword'];

            // Password validation
            if ($password !== $re_password) {
                $_SESSION['error_message'] = 'Passwords do not match!';
                header("Location: " . ROOT . "/student/studentsignup");
                exit;
            }

            // Call User model to insert data
            $userModel = new User();
            $user_id = $userModel->registerUser($user_role, $first_name, $last_name, $email, $contact_no, $dob, $password);

            if ($user_id) {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_role'] = $user_role;
                $_SESSION['email'] = $email;
                $_SESSION['first_name'] = $first_name;
                
                echo "<script>
                    alert('Registration successful');
                    window.location.href = '". ROOT ."/login';
                </script>";
                exit;
            } else {
                $_SESSION['error_message'] = 'An error occurred during registration!';
                header("Location: " . ROOT . "/student/studentsignup");
                exit;
            }
        }
    }
}

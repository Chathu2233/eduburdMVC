<?php

require_once '../app/core/Controller.php'; // Include the base controller

class TutorSignup    // Extend Controller
{
    use Controller;
    public function index()
    {
        $this->view('tutor/tutorsignup');  // Now it works!
    }

    public function register()
    {
        require_once '../app/core/Database.php';
        $db = new Database();
        $pdo = $db->connect();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_role = $_POST['user_role'];
            $first_name = $_POST['firstName'];
            $last_name = $_POST['lastName'];
            $email = $_POST['email'];
            $contact_no = $_POST['contactNumber'];
            $dob = $_POST['dob'];
            $password = $_POST['password'];
            $re_password = $_POST['reEnterPassword'];
            $years_of_experience = $_POST['years_of_experience'];

            // Handle CV upload
            $cv_upload_path = null;
            if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
                $cv_tmp_path = $_FILES['cv']['tmp_name'];
                $cv_name = basename($_FILES['cv']['name']);
                $cv_upload_path = '../public/uploads/' . $cv_name;

                move_uploaded_file($cv_tmp_path, $cv_upload_path);
            }

            if ($password !== $re_password) {
                echo json_encode(['status' => 'error', 'message' => 'Passwords do not match']);
                exit;
            }

            require_once '../app/models/Tutor.php';
            $tutor = new Tutor($pdo);

            if ($tutor->isEmailExists($email)) {
                echo json_encode(['status' => 'error', 'message' => 'Email already exists']);
                exit;
            }

            $user_id = $tutor->registerUser($user_role, $first_name, $last_name, $email, $contact_no, $dob, $password);
            $tutor->registerTutor($user_id, $years_of_experience, $cv_upload_path);

            session_start();
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_role'] = $user_role;
            $_SESSION['email'] = $email;
            $_SESSION['first_name'] = $first_name;

            echo "<script>
                alert('Registration successful');
                window.location.href = '../login.view.php';
              </script>";
            exit;
        }
    }
}

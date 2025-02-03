<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduBurd - Online Tutoring Platform</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/header_tutor.css">
</head>
<body>

    <!-- Header Section -->
    <header>
        <div class="logo">
            <img src="<?= ROOT ?>/assets/images/Modern Marketing Cover Page Document .png" alt="EduBurd Logo">
        </div>
        <nav>
            <ul>
                <li><a href="/views/home.php">Home</a></li>
                <li><a href="/views/subjectweoffer.php">Subjects</a></li>
                <li><a href="/views/tutor/subject.php">My Subjects</a></li>
                <li><a href="/views/tutor/update_time.php">Update Schedules</a></li>
                <li><a href="/views/tutor/my_account.php">My profile</a></li>
                <li><a href="/views/tutor/tutor_dashboard.php">My Dashboard</a></li>

            </ul>
        </nav>
        <div class="auth-buttons">
            <a href="/views/logout.php" class="login-btn">Logout</a>
        </div>
    </header>
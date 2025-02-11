<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduBurd - Online Tutoring Platform</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/header_guest.css">
   
</head>
<body>

    <!-- Header Section -->
    <header>
        <div class="logo">
            <img src="<?= ROOT ?>/assets/images/Modern Marketing Cover Page Document .png" alt="EduBurd Logo">
        </div>
        <nav>
            <ul>
                <li><a href="<?= ROOT ?>/home">Home</a></li>
                <li><a href="<?=ROOT?>/Subjectweoffer">Subjects</a></li>
                <li><a href="<?=ROOT?>/Findatutor">Find A Tutor</a></li>
                <li><a href="<?=ROOT?>/tutor/Tutorsignup">Become A Tutor</a></li>
                <li><a href="<?=ROOT?>/Aboutus">About Us</a></li>
                <li><a href="#contact">Contact</a></li>

            </ul>
        </nav>
        <div class="auth-buttons">
            <a href="<?= ROOT ?>/Login" class="login-btn">Login</a>
            <a href="<?= ROOT ?>/Signupmenu" class="signup-btn">Signup</a>
        </div>
    </header>
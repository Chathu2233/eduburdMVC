<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor Sign up</title>
    <link rel="stylesheet" href="<?= ROOT?>/assets/css/signup.css">
    <link rel="stylesheet" href="<?= ROOT?>/assets/css/header_guest.css">
    <script src="<?= ROOT?>/assets/js/password.js" defer></script>
    <script src="<?= ROOT?>/assets/js/filesize.js" defer></script>
</head>
<body>
<header>
<?php include __DIR__ . '/../header_guest.view.php'; ?>
</header>
<main>
    <div class="signup-container">
        <div class="signup-form">
            <h3>Tutor Signup</h3>
            <form action="<?= ROOT?>/Tutor/TutorSignup/register" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="user_role" value="tutor">
                <label for="first-name">First Name :</label>
                <input type="text" id="first-name" name="firstName" pattern="^[A-Za-z]+$" required>

                <label for="last-name">Last Name :</label>
                <input type="text" id="last-name" name="lastName" pattern="^[A-Za-z]+$" required>

                <label for="contact-number">Contact Number :</label>
                <input type="text" id="contact-number" name="contactNumber" required>

                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" required>

                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" minlength="8" required>

                <label for="reEnterPassword">Re-enter Password:</label>
                <input type="password" id="reEnterPassword" name="reEnterPassword" required>

                <label for="years_of_experience">Years of Experience :</label>
                <input type="text" id="years_of_experience" name="years_of_experience" required>

                <label for="cv-upload">Upload Your CV:</label>
                <input type="file" id="cv-upload" name="cv" accept=".pdf,.doc,.docx" required>

                <button type="submit-">Submit</button>
                <button type="reset">Cancel</button>
            </form>
        </div>
    </div>
</main>

<?php $this->view('footer'); ?>

</body>
</html>

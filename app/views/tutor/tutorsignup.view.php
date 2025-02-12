<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tutor Sign Up</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/signup.css">

    <!-- Font and Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
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
            <form action="<?= ROOT?>/tutor/tutorsignup" method="POST" enctype="multipart/form-data">
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
<input type="text" id="years_of_experience" name="YearsofExperience" required>

<label for="cv-upload">Upload Your CV:</label>
<input type="file" id="cv-upload" name="UploadYourCV" accept=".pdf,.doc,.docx" required>

                <button type="submit-">Submit</button>
                <button type="reset">Cancel</button>
            </form>
        </div>
        <div class="already-account">
                <p>Already have an account?</p>
                <a href="<?= ROOT ?>/login" class="login-large-btn">Login</a>
                </div>
        </div>
</main>

<?php include __DIR__ . '/../footer.view.php'; ?>

</body>
</html>

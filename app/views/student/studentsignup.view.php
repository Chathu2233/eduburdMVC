<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Sign Up</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/signup.css">

    <!-- Font and Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Header Section -->
    <header>
        <?php include __DIR__ . '/../header_guest.view.php'; ?>
    </header>

    <!-- Sign Up Form Section -->
    <main>
        <div class="signup-container">
            <div class="signup-form">
                <h3>Student Signup</h3>

                <?php if (!empty($error_message)): ?>
                    <div class="error-message"><?= htmlspecialchars($error_message) ?></div>
                <?php endif; ?>

                <form id="signupForm" action="<?= ROOT ?>/student/studentsignup" method="post">
                    <!-- Hidden field to store the role -->
                    <input type="hidden" name="user_role" value="student">
                    
                    <label for="first-name">First Name:</label>
                    <input type="text" id="first-name" name="firstName"
                    pattern="^[A-Za-z]+$" title="Only alphabets are allowed"
                    required>
                
                    <label for="last-name">Last Name:</label>
                    <input type="text" id="last-name" name="lastName" 
                    pattern="^[A-Za-z]+$" title="Only alphabets are allowed"
                    required>
                
                    <label for="contact-number">Contact Number:</label>
                    <input type="text" id="contact-number" name="contactNumber"
                    pattern ="^\+?[1-9]\d{1,14}$" title="Please enter a valid phone number"
                    required>
                
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" required>
                
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password"
                    minlength="8" maxlength="20"
                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                    title="Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character."
                    required>
                
                    <label for="reEnterPassword">Re-enter Password:</label>
                    <input type="password" id="reEnterPassword" name="reEnterPassword" required>
                
                    <div class="form-buttons">
                        <button type="submit" class="submit-btn">Sign Up</button>
                        <button type="reset" class="cancel-btn">Reset</button>
                    </div>
                </form>
            </div>
            <div class="already-account">
                <p>Already have an account?</p>
                <a href="<?= ROOT ?>/login" class="login-large-btn">Login</a>
            </div>
        </div>
    </main>

    <!-- Footer Section -->
    <?php include __DIR__ . '/../footer.view.php'; ?>

</body>
</html>

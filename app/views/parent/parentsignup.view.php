<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent Sign Up</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/signup.css">

    <!-- Font and Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
<header>
        <?php include __DIR__ . '/../header_guest.view.php'; ?>
    </header>

    <main>
        <div class="signup-container">
            <div class="signup-form">
                <h3>Parent Signup</h3>
                <form id="signupForm" action="<?= ROOT ?>/parent/parentsignup" method="post">
                    <input type="hidden" name="user_role" value="parent">
                    
                    <label for="first-name">First Name:</label>
                    <input type="text" id="first-name" name="firstName" pattern="^[A-Za-z]+$" required>
                
                    <label for="last-name">Last Name:</label>
                    <input type="text" id="last-name" name="lastName" pattern="^[A-Za-z]+$" required>
                
                    <label for="contact-number">Contact Number:</label>
                    <input type="text" id="contact-number" name="contactNumber" pattern="^\+?[1-9]\d{1,14}$" required>
                
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" required>
                
                    <label for="nic">NIC:</label>
                    <input type="text" id="nic" name="nic" required>
                
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" minlength="8" maxlength="20"
                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                    placeholder="Strong password (e.g., Abc@1234sde)"
                    required >
                
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

    <?php include __DIR__ . '/../footer.view.php'; ?>
</body>
</html>

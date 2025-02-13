<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/login.css">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
  <header>
    <?php include 'header_guest.view.php'; ?>
  </header>

  <div class="wrapper">
    <form id="loginForm">
      <h1>Login</h1>
      <div class="input-box">
        <input type="text" name="email" placeholder="Email" required>
        <i class="bx bxs-user"></i>
      </div>
      <div class="input-box">
        <input type="password" id="password" name="password" placeholder="Password" required>
        <i class="bx bxs-lock-alt" id="togglePassword" style="cursor: pointer;"></i>
      </div>
      <div class="remember-forgot">
        <label><input type="checkbox"> Remember Me</label>
        <a href="#">Forgot Password?</a>
      </div>
      <button type="submit" class="btn">Login</button>
    </form>
    <div class="register-link">
      <p>Don't have an account? <a href="<?= ROOT ?>/Signupmenu">Register</a></p>
    </div>
  </div>

  <script>
    // Fix Password Toggle functionality
    document.getElementById('togglePassword').addEventListener('click', function () {
      let passwordInput = document.getElementById('password');
      let type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      this.classList.toggle('bxs-lock-alt');
      this.classList.toggle('bxs-lock-open-alt');
    });

    // Ensure correct ROOT path for redirection
    const ROOT = "<?= ROOT ?>";  // Ensure this ROOT is correctly defined in your PHP controller

    // Handle form submission
    document.getElementById('loginForm').addEventListener('submit', function(event) {
      event.preventDefault();  // Prevent default form submission

      // Log to confirm form submission
      console.log("Login form submitted");

      let formData = new FormData(this);

      // Fetch the login endpoint
      fetch('<?= ROOT ?>/login/authenticate', {
        method: 'POST',
        body: formData
      })
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.json();  // Parse JSON response
      })
      .then(data => {
        console.log("Data received:", data);  // Log response data

        // Display alert with message
        alert(data.message);

        // Redirect to the homepage on successful login
        if (data.status === 'success') {
          window.location.href = ROOT + '/Home';  // Adjust path to Home route
        }
      })
      .catch(error => {
        console.error('Error:', error);  // Log any error that occurs
        alert('An error occurred. Please try again later.');
      });
    });
  </script>
</body>
</html>

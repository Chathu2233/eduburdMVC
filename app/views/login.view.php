<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="../../assets/css/login.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/login.css">
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
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" id="password" name="password" placeholder="Password" required>
        <i class='bx bxs-lock-alt' id="togglePassword" style="cursor: pointer;"></i>
      </div>
      <div class="remember-forgot">
        <label><input type="checkbox">Remember Me</label>
        <a href="#">Forgot Password?</a>
      </div>
      <button type="submit" class="btn">Login</button>
    </form>
    <div class="register-link">
      <p>Don't have an account? <a href="signupmenu.php">Register</a></p>
    </div>
  </div>

<script>
  document.getElementById('togglePassword').addEventListener('click', function () {
    let passwordInput = document.getElementById('password');
    let type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    this.classList.toggle('bxs-lock-alt');
    this.classList.toggle('bxs-lock-open-alt');
  });

  document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    fetch('../../app/controllers/Login.php?action=authenticate', {
      method: 'POST',
      body: new FormData(this)
    })
    .then(response => response.json())
    .then(data => {
      alert(data.message);
      if (data.status === 'success') {
        window.location.href = 'home.php';
      }
    })
    .catch(error => console.error('Error:', error));
  });
</script>

</body>
</html>

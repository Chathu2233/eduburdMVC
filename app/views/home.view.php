<?php
// This is your HomeView.php file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduBurd - Online Tutoring Platform</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/home.css">


</head>
<body>

    <!-- Header Section -->
    <header>
        <?php
        if (isset($_SESSION['user_role'])) {
            $role = $_SESSION['user_role'];
            include_once "header_$role.view.php";
        } else {
             include_once "header_guest.view.php";
        }
        ?>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <img src="<?= ROOT ?>/assets/images/HERO BANNER.png" alt="EduBurd Hero Banner">
        </div>
    </section>

    <div class="content-wrapper">
        <!-- Offer Section -->
        <section class="what-we-offer">
            <h2>What We Offer</h2> 
            <div class="offer-grid">
    <?php foreach ($offers as $index => $offer): ?>
        <div class="offer-item" id="<?= $index + 1 ?>"><?= $offer ?></div>
    <?php endforeach; ?>
</div>

            <div class="offer-buttons">
                <a href="<?= ROOT ?>/findatutor" class="btn">Find Your Tutor</a>
                <a href="<?= ROOT ?>/parent/parentsignup" class="btn">Track Your Child's Progress</a>
                <a href="<?= ROOT ?>/tutor/tutorsignup" class="btn">Become A Tutor</a>
            </div>
        </section>

        <!-- Student Section -->
        <section class="you-are">
            <h2>You Are</h2>
            <div class="student-grid">
    <?php foreach ($studentLevels as $key => $level): ?>
        <div class="student-item" id="<?= $key + 1 ?>">
            <?= $level ?>
        </div>
    <?php endforeach; ?>
</div>


        </section>

        <!-- Stats Section -->
        <section class="stats">
            <div class="stat-item">20+ Subjects</div>
            <div class="stat-item">20+ Tutors</div>
            <div class="stat-item">100+ Students</div>
        </section>

        <!-- Testimonials Section -->
        <section class="testimonials">
            <h2>What Our Students Say</h2>
            <div class="testimonial-slider">
                <?php foreach ($testimonials as $testimonial): ?>
                    <div class="testimonial-item">
                        <p>"<?= $testimonial['quote'] ?>"</p>
                        <h4>- <?= $testimonial['author'] ?></h4>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Free Resources Section -->
        <section class="free-resources">
            <div class="library">
                <div class="text">
                    <p>Free<br>Study<br>Resources</p>
                </div>
                <a href="<?= ROOT ?>resourcelibrary.php" class="btn">Explore Resources</a>
            </div>
        </section>
    </div>

    <!-- Footer Section -->
    <footer>
        <div class="footer-container">
            <div class="footer-logo">
                <img src="<?= ROOT ?>/assets/images/Modern Marketing Cover Page Document .png" alt="EduBurd Logo">
                <p>Empowering learners with top-quality tutoring across a variety of subjects and levels. Join us to enhance your learning journey.</p>
            </div>

            <div class="footer-links">
                <div class="footer-section">
                    <h4>Get Help</h4>
                    <ul>
                        <li><a href="<?= ROOT ?>contact">Contact Us</a></li>
                        <li><a href="<?= ROOT ?>aboutus">About Us</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Programs</h4>
                    <ul>
                        <li><a href="<?= ROOT ?>programs/primary">Primary</a></li>
                        <li><a href="<?= ROOT ?>programs/secondary">Secondary</a></li>
                        <li><a href="<?= ROOT ?>programs/igcse">IGCSE</a></li>
                        <li><a href="<?= ROOT ?>programs/as&a2">AS & A2</a></li>
                    </ul>
                </div>
                <div class="footer-section" id="contact">
                    <h4>Contact</h4>
                    <ul>
                        <li>Address: UCSC Building Complex, 35 Reid Ave, Colombo 00700</li>
                        <li>Email: support@eduburd.com</li>
                        <li>Phone: +94 761 166 329</li>
                    </ul>
                </div>

                <div class="footer-social">
                    <a href="#"><img src="<?= ROOT ?>/assets/images/facebook.png" alt="Facebook"></a>
                    <a href="#"><img src="<?= ROOT ?>/assets/images/twitter.png" alt="Twitter"></a>
                    <a href="#"><img src="<?= ROOT ?>/assets/images/instagram.png" alt="Instagram"></a>
                    <a href="#"><img src="<?= ROOT ?>/assets/images/linkedin.png" alt="LinkedIn"></a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>© 2024 EduBurd | All Rights Reserved</p>
        </div>
    </footer>

</body>
</html>

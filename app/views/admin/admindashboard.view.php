

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/admindashboard.css">
</head>
<body>

<header>
    <?php include '../app/views/header_admin.view.php'; ?>
</header>

<!-- HTML Structure -->
<div class="content-wrapper">
    <div class="dashboard-main">
        <div class="welcome-message">
            <h1>Welcome Back, Admin!</h1>
            <p>Manage your platform effectively.</p>
        </div>
        <div class="dashboard-cards">
            <!-- Dashboard Management Cards -->
            <div class="card manage-tutors">
                <h3>Manage Tutors</h3>
                <p>View, add, edit, or delete tutors.</p>
<<<<<<< HEAD
                <a href="<?= ROOT ?>/admin/managetutors" class="button">Go to Tutors</a>
=======
                <a href="managetutors1.php" class="button">Go to Tutors</a>
>>>>>>> Farshad
            </div>
            <div class="card manage-students">
                <h3>Manage Students</h3>
                <p>View, add, edit, or delete students.</p>
                <a href="<?= ROOT ?>/admin/managestudents" class="button">Go to Students</a>
            </div>
            <div class="card manage-parents">
                <h3>Manage Parents</h3>
                <p>View, add, edit, or delete parents.</p>
                <a href="<?= ROOT ?>/admin/manageparents" class="button">Go to Parents</a>
            </div>
            <div class="card manage-courses">
                <h3>Manage Courses</h3>
                <p>View, add, edit, or delete courses.</p>
                <a href="<?= ROOT ?>/admin/managecourses" class="button">Go to Courses</a>
            </div>
            <div class="card manage-announcements">
                <h3>Manage Announcements</h3>
                <p>Post new announcements for students and tutors.</p>
                <a href="<?= ROOT ?>/admin/announcements" class="button">Go to Announcements</a>
            </div>
            <div class="card manage-payments">
                <h3>Manage Payments</h3>
                <p>View and track payments and transactions.</p>
                <a href="<?= ROOT ?>/admin/managepayments" class="button">Go to Payments</a>
            </div>
            <div class="card view-analytics">
                <h3>View Analytics</h3>
                <p>Analyze platform usage and trends.</p>
                <a href="<?= ROOT ?>/admin/viewanalytics" class="button">Go to Analytics</a>
            </div>
            <div class="card manage-settings">
                <h3>Settings</h3>
                <p>Configure platform settings and preferences.</p>
                <a href="<?= ROOT ?>/admin/settings" class="button">Go to Settings</a>
            </div>
            <div class="card manage-resources">
                <h3>Resource Library</h3>
                <p>Overlook and track about Resources.</p>
                <a href="<?= ROOT ?>/admin/resourcelibrary" class="button">Explore Resources</a>
            </div>
        </div>
    </div>
</div>

<?php $this->view('footer'); ?>

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>

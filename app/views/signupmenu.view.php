<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Actor</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/signupmenu.css">
   
</head>

<body>
<header class="navbar">
        <?php include 'header_guest.view.php'; ?>
    </header>

    <div class="container">
    <div class="actor-container">
        <!-- Student Box -->
        <a href="<?=ROOT?>/student/studentsignup" class="actor-box student-box">
            <h2>Student</h2>
        </a>

        <!-- Parent Box -->
        <a href="<?=ROOT?>/parent/parentsignup" class="actor-box parent-box">
            <h2>Parent</h2>
        </a>

        <!-- Tutor Box -->
        <a href="<?=ROOT?>/tutor/tutorsignup" class="actor-box tutor-box">
            <h2>Tutor</h2>
        </a>
    </div>
    </div>
    <?php include 'footer.php'; ?> 

</body>
</html>

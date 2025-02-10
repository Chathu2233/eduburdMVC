<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduBurd - Online Tutoring Platform</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/subjectweoffer.css">
    
</head>
<body>

    <!-- Header Section -->
  
    <header>
    <?php
    if (isset($_SESSION['user_role'])) {
        $this->view("header_" . $_SESSION['user_role']);
    } else {
        $this->view("header_guest");
    }
    ?>
</header>

 <!-- Content Section -->
 <div class="content-wrapper">
    <!-- Page Breadcrumb -->
    <div class="breadcrumb">
        <p>Homepage &gt; Subjects</p>
    </div>
    
    <!-- Subjects We Offer Section -->
    <section class="subjects-section">
        <h1>Subjects We Offer,</h1>
    </section>

    <!-- Tuition Sections -->
    <section class="tuition-section">
        <h2>Personalised Primary And Lower Secondary Tuition</h2>
        <div class="tuition-content">
            <div class="subject-card">
                <img src="<?=ROOT?>/assets/images/primary.webp" alt="Primary" class="subject-image">
            </div>
            <div class="subject-card">
                <p>Foundational subjects to build essential skills and foster curiosity.
                <ul>
                    <li>English</li>
                    <li>Mathematics</li>
                    <li>Science</li>
                    <li>Social Studies</li>
                    <li>ICT</li>
                </ul></p>
            </div>
        </div>
        <button class="search-button"><a href="<?=ROOT?>/findatutor">Search For Tutors</a> </button>
    </section>

    <section class="tuition-section">
        <h2>Personalised IGCSE (International General Certificate of Secondary Education) Tuition</h2>
        <div class="tuition-content">
            <div class="subject-card">
                <p>Comprehensive subjects that develop analytical and academic skills in preparation for advanced studies.
                    <ul>
                        <li>English Language and Literature</li>
                        <li>Mathematics</li>
                        <li>Physics</li>
                        <li>Chemistry</li>
                        <li>Biology</li>
                        <li>Business Studies</li>
                        <li>ICT</li>
                    </ul></p>
            </div>
            <div class="subject-card">
                <img src="<?=ROOT?>/assets/images/igcse.webp" alt="IGCSE" class="subject-image">
            </div>
        </div>
        <button class="search-button"><a href="findatutor.php">Search For Tutors</a> </button>
    </section>

    <section class="tuition-section">
        <h2>Personalised A1 & A2 (Advanced Level - Years 1 & 2) Tuition</h2>
        <div class="tuition-content">
            <div class="subject-card">
                <img src="<?=ROOT?>/assets/images/A2.webp" alt="A2" class="subject-image">
            </div>
            <div class="subject-card">
                <p>In-depth courses designed for specialization and preparation for higher education.
                <ul>
                    <li>English Literature</li>
                    <li>Mathematics</li>
                    <li>Physics</li>
                    <li>Chemistry</li>
                    <li>Biology</li>
                    <li>Economics</li>
                    <li>Business Studies</li>
                    <li>Psychology</li>
                </ul></p></div>
        </div>
        <button class="search-button"><a href="findatutor.php">Search For Tutors</a> </button>
    </section>

 </div>
     <!-- Free Resources Section -->
     <section class="free-resources">
            <div class="library">
                <div class="text">
                    <p>Free<br>Study<br>Resources</p>
                </div>
                <a href="resourcelibrary.php" class="btn">Explore Resources</a>
            </div>
        </section>

</div>

<?php $this->view('footer'); ?>
</body>
</html>
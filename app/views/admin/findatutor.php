<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduBurd - Find a Tutor</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/admin/findatutor.css">
</head>
<body>

    <!-- Header Section -->

    <header >
    <?php
    include '../header_admin.php'
    ?>
    </header>

 <!-- Content Section -->
 <div class="content-wrapper">
    <!-- Page Breadcrumb -->
    <div class="breadcrumb">
        <p>Homepage &gt; Find a tutor </p>
    </div>
    
    <div class="search-bar">
        <input type="text" placeholder="Search for a tutor...">
        <button class="search-btn">🔍</button>
    </div>
    <!-- Main Content -->
    <div class="container">
        <!-- Sidebar Filters -->
        <aside class="sidebar">
            <h2>Filter Tutors</h2>
            <div class="filter">
                <label for="subject">Subject</label>
                <select id="subject">
                    <option>All Subjects</option>
                    <option>Mathematics</option>
                    <option>Science</option>
                    <option>English</option>

                    <!-- Add more subjects as needed -->
                </select>
            </div>
            <div class="filter">
                <label for="level">Education Level</label>
                <select id="level">
                    <option>All Levels</option>
                    <option>Primary</option>
                    <option>Secondary</option>
                    <option>IGCSE</option>
                    <option>AS & A2</option>
                </select>
            </div>
           
        </aside>

        <!-- Tutor List -->
        <main class="tutor-list">
            <div class="tutor">
            <img src="1522074604099.jpeg" alt="Tutor Profile">
                <div class="tutor-info">
                <h3>Tharindu Senanayake</h3>
                  
                    <p>Classes Taught: 200</p>
                    <p>Subjects: Physics</p>
                    <p>Price: LKR 3500 per hour</p>
                    <button onclick="viewProfile()">View Profile</button>
                </div>
            </div>
            <div class="tutor">
                <img src="1700037891405.jpeg" alt="Tutor Profile">
                <div class="tutor-info">
                <h3>Chandana Perera</h3>
                    <p>Classes Taught: 180</p>
                    <p>Subjects: Mathematics</p>
                    <p>Price: LKR 3000 per hour</p>
                    <button onclick="viewProfile()">View Profile</button>
                </div>
            </div>

            <div class="tutor">
                <img src="Chandana-Wijesundara.jpg" alt="Tutor Profile">
                <div class="tutor-info">
                <h3>Priyanka Gunasekara </h3>
                    <p>Classes Taught: 150</p>
                    <p>Subjects: English Language, Literature</p>
        <p>Price: LKR 2500 per hour</p>
                    <button onclick="viewProfile()">View Profile</button>
                </div>
            </div>

            <div class="tutor">
                <img src="images.jpeg" alt="Tutor Profile">
                <div class="tutor-info">
                <h3>Kavinda Ranjith</h3>

                <p>Classes Taught: 220</p>
                <p>Subjects: Sinhala Language</p>
                <p>Price: LKR 2800 per hour</p>
                    <button onclick="viewProfile()">View Profile</button>
                </div>
            </div>

            <div class="tutor">
                <img src="Indrani-Samarakoon.jpg" alt="Tutor Profile">
                <div class="tutor-info">
                <h3>Nadeesha Fernando </h3>
             
                <p>Classes Taught: 250</p>
                <p>Subjects: Chemistry</p>
                <p>Price: LKR 4000 per hour</p>
                    <button onclick="viewProfile()">View Profile</button>
                </div>
            </div>
            <section>
                <div class="pagination">
            <a href="#">&laquo;</a>
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">&raquo;</a>
        </div>
    </section>
           
            <!-- Repeat the structure above for additional tutors -->
        </main>
    </div>

    </div>
 <!-- Footer Section -->
 <footer>
        <div class="footer-container">
            <!-- Logo and Description -->
            <div class="footer-logo">
                <img src="Modern Marketing Cover Page Document .png" alt="EduBurd Logo">
                <p>Empowering learners with top-quality tutoring across a variety of subjects and levels. Join us to enhance your learning journey.</p>
            </div>

            <!-- Footer Links -->
            <?php include '../footer.php'; ?>

    <script>

// Function to simulate viewing profile - replace with actual routing as needed
function viewProfile() {
    alert("This will redirect to the tutor's profile page.");
}

// Add event listeners to filter dropdowns to dynamically filter tutors
document.getElementById('subject').addEventListener('change', filterTutors);
document.getElementById('level').addEventListener('change', filterTutors);
document.getElementById('price').addEventListener('change', filterTutors);

function filterTutors() {
    const selectedSubject = document.getElementById('subject').value;
    const selectedLevel = document.getElementById('level').value;
    const selectedPrice = document.getElementById('price').value;

    const tutors = document.querySelectorAll('.tutor');
    tutors.forEach(tutor => {
        let matchesFilter = true;

        if (selectedSubject !== 'All Subjects' && !tutor.innerHTML.includes(selectedSubject)) {
            matchesFilter = false;
        }
        if (selectedLevel !== 'All Levels' && !tutor.innerHTML.includes(selectedLevel)) {
            matchesFilter = false;
        }
        if (selectedPrice !== 'All' && !tutor.innerHTML.includes(selectedPrice)) {
            matchesFilter = false;
        }

        tutor.style.display = matchesFilter ? 'flex' : 'none';
    });
}




    </script>
</body>
</html>

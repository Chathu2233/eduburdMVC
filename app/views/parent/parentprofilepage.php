<?php
session_start();
require '../db.php';

// Verify user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "User ID is not set in the session.";
    exit;
}

$user_id = $_SESSION['user_id'];

// Prepare and execute query
$query = "
    SELECT 
        parent.parent_id, 
        user.first_name AS firstname, 
        user.last_name AS lastname, 
        user.email, 
        user.contact_no AS contactnumber, 
        parent.nic
    FROM parent
    JOIN user ON parent.user_id = user.user_id
    WHERE parent.user_id = :user_id
";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    echo "No profile found for the logged-in user.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="../../assets/css/parent/parentprofile.css">
</head>
<body>
    <header>
        <?php include '../header_parent.php'; ?>
    </header>
    <main>
        <div class="profile-container">
            <h2>My Profile</h2>
            <img src="../../assets/images/pic-9.jpg" alt="Profile Picture">
            <div class="profile-details">
                <div class="profile-box">
                    <p><strong>Parent ID: </strong> <?php echo htmlspecialchars($row['parent_id']); ?></p>
                </div>
                <div class="profile-box">
                    <p><strong>First Name: </strong> <?php echo htmlspecialchars($row['firstname']); ?></p>
                </div>
                <div class="profile-box">
                    <p><strong>Last Name: </strong> <?php echo htmlspecialchars($row['lastname']); ?></p>
                </div>
                <div class="profile-box">
                    <p><strong>Contact Number: </strong> <?php echo htmlspecialchars($row['contactnumber']); ?></p>
                </div>
                <div class="profile-box">
                    <p><strong>E-mail: </strong> <?php echo htmlspecialchars($row['email']); ?></p>
                </div>
                <div class="profile-box">
                    <p><strong>NIC: </strong> <?php echo htmlspecialchars($row['nic']); ?></p>
                </div>
            </div>
            <div>
                <button class="edit-button"><a href="editprofile.php">Edit</a></button>
            </div>
        </div>
    </main>
    <?php include '../footer.php'; ?>
</body>
</html>

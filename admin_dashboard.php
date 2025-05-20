<?php
session_start();
if (!isset($_SESSION['username']) || !$_SESSION['is_admin']) {
    echo "Access denied.";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/style.css">
    <title>Admin Dashboard</title>
</head>
<body>
<div class="navbar">
    <a href="dashboard.php">Dashboard</a>
    <a href="user_logout.php">Logout</a>
</div>
<div class="container">
    <h2>All Leak Reports</h2>
    <?php
    require 'db.php';
    $sql = "SELECT * FROM leaks ORDER BY created_at DESC";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<div><strong>User: {$row['submitted_by']}</strong><br>{$row['description']}<br><img src='{$row['image_path']}'></div><hr>";
    }
    ?>
</div>
</body>
</html>
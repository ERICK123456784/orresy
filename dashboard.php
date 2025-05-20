<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: user_login.html");
    exit();
}
$is_admin = $_SESSION['is_admin'] ?? false;
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/style.css">
    <title>Dashboard</title>
</head>
<body>
<div class="navbar">
    <a href="dashboard.php">Dashboard</a>
    <a href="report.html">Report Leak</a>
    <?php if ($is_admin) echo '<a href="admin_dashboard.php">Admin Panel</a>'; ?>
    <a href="user_logout.php">Logout</a>
</div>
<div class="container">
    <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
    <h3>Your Leak Reports</h3>
    <?php
    require 'db.php';
    $user = $_SESSION['username'];
    $sql = "SELECT * FROM leaks WHERE submitted_by = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        echo "<div><strong>{$row['description']}</strong><br><img src='{$row['image_path']}'></div><hr>";
    }
    ?>
</div>
</body>
</html>
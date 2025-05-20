<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: user_login.html");
    exit();
}
require 'db.php';

$description = $_POST['description'];
$image_path = 'uploads/' . basename($_FILES['image']['name']);
move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
$user = $_SESSION['username'];

$sql = "INSERT INTO leaks (description, image_path, submitted_by) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $description, $image_path, $user);
$stmt->execute();

header("Location: dashboard.php");
?>
<?php
require 'db.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$question = $_POST['security_question'];
$answer = $_POST['security_answer'];

$sql = "INSERT INTO users (username, email, password, security_question, security_answer, is_verified) VALUES (?, ?, ?, ?, ?, 1)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $username, $email, $password, $question, $answer);

if ($stmt->execute()) {
    echo "Registration successful. You can <a href='user_login.html'>login now</a>.";
} else {
    echo "Error: " . $stmt->error;
}
?>
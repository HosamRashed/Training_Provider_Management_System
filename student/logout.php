<?php
session_start();

// Unset or destroy the session variables
unset($_SESSION['user-email']);
unset($_SESSION['user-password']);
unset($_SESSION['user_id']);
session_destroy();

// Redirect the user to the desired page after sign-out
$url = "http://localhost/hSchool/student/index.php"; // Replace with your desired URL
header("Location: $url");
exit;
?>

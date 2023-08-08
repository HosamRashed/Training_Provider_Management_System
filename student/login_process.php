<?php
session_start();
require('../dbm.php');
$dbconn = new DatabaseManager;
$dbconn->connect();

$email = $_GET['email'];
$password = $_GET['password'];

// Check if the user is an Instructor
$sql = "SELECT * FROM Instructor WHERE Email = '$email' AND Password = '$password'";
$result = $dbconn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['user-email'] = $email;
    $_SESSION['user-password'] = $password;
    $row = $result->fetch_assoc();
    $user_id = $row['InstructorID'];
    $_SESSION['user_id'] = $user_id; // Replace $user_id with the actual ID of the logged-in user
    $_SESSION['is_instructor'] = true;
    $url = "http://localhost/hSchool/instructor_dashboard/index.php";
    header("Location: $url");
   
    exit;
}

// Check if the user is a Student
$sql = "SELECT * FROM Student WHERE Email = '$email' AND Password = '$password'";
$result = $dbconn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['user-email'] = $email;
    $_SESSION['user-password'] = $password;
    // session_start();
    $row = $result->fetch_assoc();
    $user_id = $row['StudentID'];
    $_SESSION['user_id'] = $user_id; // Replace $user_id with the actual ID of the logged-in user
    $url = "http://localhost/hSchool/student/index.php";
    header("Location: $url");
    exit;
}

// Check if the user is a Training Provider
$sql = "SELECT * FROM TrainingProvider WHERE Email = '$email' AND Password = '$password'";
$result = $dbconn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['user-email'] = $email;
    $_SESSION['user-password'] = $password;
    $row = $result->fetch_assoc();
    $user_id = $row['TrainingProviderID'];
    $_SESSION['user_id'] = $user_id; // Replace $user_id with the actual ID of the logged-in user
    $url = "http://localhost/hSchool/trainingprovider_dashboard/index.php";
    header("Location: $url");
    exit;
}

// If none of the above conditions are met, the credentials are invalid
$url = "http://localhost/hSchool/student/login.php?credentials=Invalidusernameorpassword";
header("Location: $url");
exit;

?>

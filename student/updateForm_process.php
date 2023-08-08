<?php
require('../dbm.php');
include('functions.php');
$dbconn = new DatabaseManager;
$dbconn->connect();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    echo "<script>console.log('Course ID from session: $user_id');</script>";
} else {
    $user_id = 1;
    echo "<script>console.log('Course ID is not set in the session.');</script>";
}

$user = getUser($user_id);

function update()
{
    global $dbconn;
    global $user_id;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $dateOfBirth = $_POST['dateOfBirth'];

        $sql = "UPDATE student SET FirstName = '$firstName', LastName = '$lastName', Gender = '$gender', Email = '$email', Birthdate = '$dateOfBirth' WHERE StudentID = $user_id";
        $dbconn->query($sql);

        // Redirect to the login page after successful registration
        $url = "http://localhost/hSchool/student/profile.php";
        header("Location: $url");
        exit(); // Ensure script execution stops after redirection
    }
}

update();
?>
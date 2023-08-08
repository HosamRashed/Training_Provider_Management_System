<?php
require('../dbm.php');
$dbconn = new DatabaseManager;
$dbconn->connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $status = $_POST['membershipRadios'];
    $specialization = $_POST['specialization'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $description = $_POST['discription'];


    $sql = "INSERT INTO Instructor (FirstName, LastName, Gender, Birthdate, Status, Email, Phone, Password, Specialization, Description)
VALUES ('$firstName', '$lastName', '$gender', '$dateOfBirth', '$status', '$email', '$phone', '$password', '$specialization', '$description');
    ";

    $result = $dbconn->query($sql);
    if ($result) {
        // Insert successful
        echo "<script>alert('User information inserted successfully.');
        window.location.href = 'http://localhost/hSchool/trainingprovider_dashboard/instructorHomePage.php';
        </script>";
    } else {
        // Insert failed
        echo "<script>alert('Error inserting user information: " . $dbconn->error . "');
        window.location.href = 'http://localhost/hSchool/trainingprovider_dashboard/instructorHomePage.php';
        </script>";

    }
}

$dbconn->close();
?>
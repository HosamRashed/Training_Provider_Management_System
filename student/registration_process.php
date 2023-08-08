<?php

require('dbm.php');
$dbconn = new DatabaseManager;
$dbconn->connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $password = $_POST['password'];

    $sql = "INSERT INTO Student (FirstName, LastName, Gender , Status , Birthdate, Email, Phone, Password)
            VALUES ('$firstName', '$lastName', '$gender', 'Active', '$dateOfBirth', '$email', '$phone', '$password')";
    $dbconn->query($sql);

    // Redirect to the login page after successful registration
    $url = "http://localhost/finalFront/login.php";
    header("Location: $url");
    exit(); // Ensure script execution stops after redirection
}
?>

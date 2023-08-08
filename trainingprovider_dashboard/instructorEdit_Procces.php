<?php
require('../dbm.php');
$dbconn = new DatabaseManager;
$dbconn->connect();



if (isset($_POST['submit'])) {

    global $dbconn;
    $userID = $_POST['user_id'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $status = $_POST['membershipRadios'];
    $specialization = $_POST['specialization'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    $sql = "UPDATE Instructor SET FirstName = '$firstName', LastName = '$lastName', Gender = '$gender', Email = '$email', Birthdate = '$dateOfBirth', Status = '$status', Specialization = '$specialization', Password = '$password', Phone = '$phone' WHERE InstructorID = $userID";
    $dbconn->query($sql);
    if ($dbconn->query($sql)) {
        // Update successful
        echo "<script>alert('User information updated successfully.');
        window.location.href = 'http://localhost/hSchool/trainingprovider_dashboard/instructorHomePage.php';
        </script>";
    } else {
        // Update failed
        echo "<script>alert('Error updating user information: " . $dbconn->error . "');
        window.location.href = 'http://localhost/hSchool/trainingprovider_dashboard/instructorHomePage.php';
        </script>";
    }
    

}

?>
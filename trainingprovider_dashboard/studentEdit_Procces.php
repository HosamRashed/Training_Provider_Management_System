<?php
require('../dbm.php');
$dbconn = new DatabaseManager;
$dbconn->connect();

if (isset($_POST['submit'])) {

    $userID = $_POST['user_id'];
    $status = $_POST['membershipRadios'];
    $sql = "UPDATE Student SET  Status = '$status' WHERE StudentID = $userID";
    $dbconn->query($sql);
    if ($dbconn->query($sql)) {
        // Update successful
        echo "<script>alert('User information updated successfully.');
        window.location.href = 'http://localhost/hSchool/trainingprovider_dashboard/studentHomePage.php';
        </script>";
    } else {
        // Update failed
        echo "<script>alert('Error updating user information: " . $dbconn->error . "');
        window.location.href = 'http://localhost/hSchool/trainingprovider_dashboard/studentHomePage.php';
        </script>";
    }


}

?>
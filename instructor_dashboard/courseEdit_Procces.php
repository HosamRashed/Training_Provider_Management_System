<?php

require('../dbm.php');
include('../dashboard.php');
$dbconn = new DatabaseManager;
$dbconn->connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $courseID = $_POST['courseID'];
    $instructorId = $_POST['instructorID'];
   
    $availability = $_POST['availability'];
    if ($availability == 'Available'){
        $availability = 'available';
    }
    else{
        $availability = 'notavailable';
    }

    $sql = "UPDATE Course_Instructor SET availability = '$availability' WHERE InstructorID = '$instructorId' AND CourseID = '$courseID'";

    if ($dbconn->query($sql)) {
        // Update successful
        echo "<script>alert('Course information updated successfully.');
        window.location.href = 'http://localhost/hSchool/instructor_dashboard/index.php';
        </script>";
    } else {
        // Update failed
        echo "<script>alert('Error updating Course information: " . $dbconn->error . "');
        window.location.href = 'http://localhost/hSchool/instructor_dashboard/index.php';
        </script>";
    }
} else {
    // The request method is not POST
}

?>
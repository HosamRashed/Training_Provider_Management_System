<?php
require('../dbm.php');
$dbconn = new DatabaseManager;
$dbconn->connect();

if (isset($_GET['course_id'])) {
    $courseID = $_GET['course_id'];
    
    // Check if the user is logged in and retrieve the user ID from the session
    if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
        
        $sql = "DELETE FROM `student_course` WHERE `StudentID` = $user_id AND `CourseID` = $courseID";
        if ($dbconn->query($sql)) {
            echo "<script>alert('Course unenrolled successfully.');
                window.location.href = 'http://localhost/hSchool/trainingprovider_dashboard/studentEdit.php?Student_id=$user_id';
                </script>";
               
        } else {
            echo "<script>alert('There was an error unenrolling from the course.');
            window.location.href = 'http://localhost/hSchool/trainingprovider_dashboard/studentEdit.php?Student_id=$user_id';
            </script>";
        }
    } else {
        echo "User ID is not available in the session.";
    }

    $dbconn->close();
}
?>
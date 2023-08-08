<?php
require('../dbm.php');
$dbconn = new DatabaseManager;
$dbconn->connect();

if (isset($_GET['course_id'])) {
    $courseID = $_GET['course_id'];
    
    // Check if the user is logged in and retrieve the user ID from the session
    if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
        
        $sql = "INSERT INTO `student_course` (`StudentID`, `CourseID`) VALUES ($user_id, $courseID);";
        if ($dbconn->query($sql)) {
            echo "<script>alert('Course enrolled successfully.');
                window.location.href = 'http://localhost/hSchool/student/myCourses.php';
                </script>";
        } else {
            echo "<script>alert('There was an error enrolling in the course.');
            window.location.href = 'http://localhost/hSchool/student/myCourses.php';
            </script>";
        }
    } else {
        echo "User ID is not available in the session.";
    }

    $dbconn->close();
}
?>


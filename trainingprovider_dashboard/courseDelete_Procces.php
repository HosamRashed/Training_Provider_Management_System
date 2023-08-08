<?php
include('../dashboard.php');

if (isset($_GET['course_id'])) {
    $courseID = $_GET['course_id'];

    // Create a MySQLi connection
    $mysqli = new mysqli("localhost", "root", "", "h-school");

    // Check if the connection was successful
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }
    // Alter the foreign key constraint to enable cascading deletion

    // Delete from student_course table
    $deleteQuery1 = "DELETE FROM Student_Course WHERE CourseID = $courseID";
    $mysqli->query($deleteQuery1);

    // Delete from instructor_course table
    $deleteQuery2 = "DELETE FROM Course_Instructor WHERE CourseID = $courseID";
    $mysqli->query($deleteQuery2);

    // Delete from course table
    $deleteQuery3 = "DELETE FROM course WHERE CourseID = $courseID";
    $mysqli->query($deleteQuery3);
    
    // Execute the query
    if ($mysqli->query($deleteQuery3)) {
        echo "<script>alert('course deleted successfully.');
            window.location.href = 'http://localhost/hSchool/trainingprovider_dashboard/courseHomePage.php';
            </script>";
    } else {
        echo "<script>alert('Error deleting course.');
        window.location.href = 'http://localhost/hSchool/trainingprovider_dashboard/courseHomePage.php';
        </script>";
    }

    // Close the database connection
    $mysqli->close();
}
?>

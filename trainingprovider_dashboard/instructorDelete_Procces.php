<?php
include('../dashboard.php');

if (isset($_GET['instructor_id'])) {
    $instructorID = $_GET['instructor_id'];

    // Create a MySQLi connection
    $mysqli = new mysqli("localhost", "root", "", "h-school");

    // Check if the connection was successful
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

    // Delete from instructor_course table
    $deleteQuery2 = "DELETE FROM Course_Instructor WHERE InstructorID = $instructorID";
    $mysqli->query($deleteQuery2);

    $sql = "DELETE FROM Instructor WHERE InstructorID = $instructorID";
    
    // Execute the query
    if ($mysqli->query($sql)) {
        echo "<script>alert('Instructor deleted successfully.');
            window.location.href = 'http://localhost/hSchool/trainingprovider_dashboard/instructorHomePage.php';
            </script>";
    } else {
        echo "<script>alert('Error deleting instructor.');
        window.location.href = 'http://localhost/hSchool/trainingprovider_dashboard/instructorHomePage.php';
        </script>";
    }

    // Close the database connection
    $mysqli->close();
}
?>

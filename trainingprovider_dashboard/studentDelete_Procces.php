<?php
include('../dashboard.php');

if (isset($_GET['student_id'])) {
    $studentID = $_GET['student_id'];

    // Create a MySQLi connection
    $mysqli = new mysqli("localhost", "root", "", "h-school");

    // Check if the connection was successful
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

   // Alter the foreign key constraint to enable cascading deletion
   $alterQuery = "ALTER TABLE Student_Course DROP FOREIGN KEY student_course_ibfk_1";
   $mysqli->query($alterQuery);

   $alterQuery = "ALTER TABLE Student_Course ADD FOREIGN KEY (StudentID) REFERENCES Student(StudentID) ON DELETE CASCADE";
   $mysqli->query($alterQuery);

   // Prepare the SQL statement
   $sql = "DELETE FROM student WHERE StudentID = $studentID";

    // Execute the query
    if ($mysqli->query($sql)) {
        echo "<script>alert('Student deleted successfully. ');
            window.location.href = 'http://localhost/hSchool/trainingprovider_dashboard/studentHomePage.php';
            </script>";
    } else {
        echo "<script>alert('Error deleting Student.');
        window.location.href = 'http://localhost/hSchool/trainingprovider_dashboard/studentHomePage.php';
        </script>";
    }

    // Close the database connection
    $mysqli->close();
}
?>
<?php
require('../dbm.php');
include('../dashboard.php');

$dbconn = new DatabaseManager;
$dbconn->connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $status = $_POST['status'];


    $sql = "INSERT INTO Course (Title, Category, Description, StartDate, EndDate, Status ) 
    VALUES ('$title', '$category', '$description', '$startDate', '$endDate', '$status');";
    $result = $dbconn->query($sql);


    $sql = "SELECT CourseID FROM Course ORDER BY CourseID DESC LIMIT 1";

    $result = $dbconn->query($sql);
    $row = mysqli_fetch_assoc($result);
    // Retrieve the CourseID
    $courseID = $row['CourseID'];

    $checkedInstructorIDs = array();
    $uncheckedInstructorIDs = array();
    $instructors = getAllInstructors();

    foreach ($instructors as $instructor) {
        $instructorID = $instructor['InstructorID'];

        if (isset($_POST['instructorIDs']) && in_array($instructorID, $_POST['instructorIDs'])) {
            // Checkbox is checked
            $checkedInstructorIDs[] = $instructorID;
        } else {
            // Checkbox is unchecked
            $uncheckedInstructorIDs[] = $instructorID;
        }
    }

    foreach ($checkedInstructorIDs as $instructorID) {
        echo $instructorID . "\n";
        $sql = "INSERT INTO Course_Instructor (CourseID, InstructorID) VALUES ($courseID, $instructorID)";
        $result = $dbconn->query($sql);
        if ( $result) {
            // Insertion successful
            echo "<script>alert('Course created successfully.');
                window.location.href = 'http://localhost/hSchool/trainingprovider_dashboard/courseHomePage.php';
                </script>";
        } else {
            // Error occurred during insertion
            echo "<script>alert('Error creating Course : " . $dbconn->error . "');
                window.location.href = 'http://localhost/hSchool/trainingprovider_dashboard/courseHomePage.php';
                </script>";
        }

    }


}

$dbconn->close();
?>
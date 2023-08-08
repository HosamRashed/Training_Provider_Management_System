<?php

require('../dbm.php');
include('../dashboard.php');
$dbconn = new DatabaseManager;
$dbconn->connect();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $courseID = $_POST['courseID'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $status = $_POST['status'];
    $instructorStatus = 'available';

    $sql = "UPDATE Course SET Title = '$title', Category = '$category', Description = '$description', StartDate = '$startDate', EndDate = '$endDate', Status = '$status' WHERE CourseID = '$courseID'";
    $dbconn->query($sql);



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
        // Check if the combination of CourseID and InstructorID already exists
        $sql = "SELECT * FROM Course_Instructor WHERE CourseID = $courseID AND InstructorID = $instructorID";
        $result = $dbconn->query($sql);

        if ($result->num_rows == 0) {
            // Combination does not exist, insert it into the Course_Instructor table
            $sql = "INSERT INTO Course_Instructor (CourseID, InstructorID, availability) VALUES ($courseID, $instructorID, 'available')";
            if ($dbconn->query($sql)) {
                // Insertion successful
                echo "Combination ($courseID, $instructorID) inserted successfully.";
            } else {
                // Error occurred during insertion
                echo "Error inserting combination ($courseID, $instructorID): " . $mysqli->error;
            }
        } else {
            // Combination already exists, skip
            echo "Combination ($courseID, $instructorID) already exists.";
        }
    }
    foreach ($uncheckedInstructorIDs as $instructorID) {
        // Check if the combination of CourseID and InstructorID exists
        $sql = "SELECT * FROM Course_Instructor WHERE CourseID = $courseID AND InstructorID = $instructorID";
        $result = $dbconn->query($sql);

        if ($result->num_rows > 0) {
            // Combination exists, delete it from the Course_Instructor table
            $sql = "DELETE FROM Course_Instructor WHERE CourseID = $courseID AND InstructorID = $instructorID";
            if ($dbconn->query($sql)) {
                // Deletion successful
                echo "Combination ($courseID, $instructorID) deleted successfully.";
            } else {
                // Error occurred during deletion
                echo "Error deleting combination ($courseID, $instructorID): " . $mysqli->error;
            }
        } else {
            // Combination does not exist, skip
            echo "Combination ($courseID, $instructorID) does not exist.";
        }
    }

    if ($dbconn->query($sql)) {
        // Update successful
        echo "<script>alert('Course information updated successfully.');
        window.location.href = 'http://localhost/hSchool/trainingprovider_dashboard/courseHomePage.php';
        </script>";
    } else {
        // Update failed
        echo "<script>alert('Error updating Course information: " . $dbconn->error . "');
        window.location.href = 'http://localhost/hSchool/trainingprovider_dashboard/courseHomePage.php';
        </script>";
    }
} 
?>
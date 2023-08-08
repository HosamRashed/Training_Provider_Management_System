<?php

require('dbm.php');
$dbconn = new DatabaseManager;
$dbconn->connect();

function getCourse($course_id)
{
    global $dbconn;
    $sql = "SELECT * FROM Course WHERE CourseID = $course_id";
    $result = $dbconn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return null; // or handle the case when no result is found
    }
}


function getInstructors($course_id)
{
    global $dbconn;
    $sql = "SELECT InstructorID FROM Course_Instructor WHERE CourseID = $course_id";
    $result = $dbconn->query($sql);

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        $instructors = array(); // Array to store instructor data

        // Loop through each row and fetch the instructor IDs
        while ($row = $result->fetch_assoc()) {
            $instructorID = $row['InstructorID'];

            // Fetch instructor data based on the instructor ID
            $instructorSql = "SELECT * FROM Instructor WHERE InstructorID = $instructorID";
            $instructorResult = $dbconn->query($instructorSql);

            // Check if the instructor data is found
            if ($instructorResult->num_rows > 0) {
                $instructorData = $instructorResult->fetch_assoc();
                $instructors[] = $instructorData; // Add instructor data to the array
            } else {
                echo "No instructor found with ID: $instructorID<br>";
            }
        }

        return $instructors; // Return the array of instructors
    } else {
        echo "No instructors found for the given course ID.";
        return null;
    }
}

?>
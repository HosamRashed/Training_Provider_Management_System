<?php
require('../dbm.php');
$dbconn = new DatabaseManager;
$dbconn->connect();

function getTrainingProvider($userID)
{
    global $dbconn;
    $sql = "SELECT * FROM TrainingProvider WHERE TrainingProviderID = $userID";
    $result = $dbconn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return null; // or handle the case when no result is found
    }
}

function getInstructor($userID)
{
    global $dbconn;
    $sql = "SELECT * FROM Instructor WHERE InstructorID = $userID";
    $result = $dbconn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return null; // or handle the case when no result is found
    }
}
function getStudent($userID)
{
    global $dbconn;
    $sql = "SELECT * FROM Student WHERE StudentID = $userID";
    $result = $dbconn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return null; // or handle the case when no result is found
    }
}
function getCourse($courseID)
{
    global $dbconn;
    $sql = "SELECT * FROM Course WHERE CourseID = $courseID";
    $result = $dbconn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return null;
    }
}
function getCourseNumber()
{
    global $dbconn;
    $sql = "SELECT COUNT(*) AS courseCount FROM Course";
    $result = $dbconn->query($sql);
    $row = $result->fetch_assoc();
    $courseCount = $row['courseCount'];
    return $courseCount;
}

function getInstructorNumber()
{
    global $dbconn;
    $sql = "SELECT COUNT(*) AS instructorCount FROM Instructor";
    $result = $dbconn->query($sql);
    $row = $result->fetch_assoc();
    $instructorCount = $row['instructorCount'];
    return $instructorCount;
}

function getStudentNumber()
{
    global $dbconn;
    $sql = "SELECT COUNT(*) AS studentCount FROM Student";
    $result = $dbconn->query($sql);
    $row = $result->fetch_assoc();
    $studentCount = $row['studentCount'];
    return $studentCount;
}

function getLast10Students()
{
    global $dbconn;
    $sql = "SELECT * FROM Student ORDER BY StudentID DESC LIMIT 10";
    $result = $dbconn->query($sql);

    $students = array();
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
    return $students;
}

function getLast10Instructors()
{
    global $dbconn;
    $sql = "SELECT * FROM Instructor ORDER BY InstructorID DESC LIMIT 10";
    $result = $dbconn->query($sql);

    $instructors = array();
    while ($row = $result->fetch_assoc()) {
        $instructors[] = $row;
    }
    return $instructors;

}

function getLast10Courses()
{
    global $dbconn;
    $sql = "SELECT * FROM Course ORDER BY CourseID DESC LIMIT 10";
    $result = $dbconn->query($sql);

    $courses = array();
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
    return $courses;
}

function getAllInstructors()
{
    global $dbconn;
    $sql = "SELECT * FROM Instructor";
    $result = $dbconn->query($sql);

    $instructors = array();
    while ($row = $result->fetch_assoc()) {
        $instructors[] = $row;
    }
    return $instructors;
}

function getLastAllCourses()
{
    global $dbconn;
    $sql = "SELECT * FROM Course";
    $result = $dbconn->query($sql);

    $courses = array();
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
    return $courses;
}
function getLastAllStudent()
{
    global $dbconn;
    $sql = "SELECT * FROM Student";
    $result = $dbconn->query($sql);

    $students = array();
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
    return $students;
}

function deleteInstructor($userID) {
    global $dbconn;
    

    // Perform the delete SQL code based on the provided ID
    $sql = "DELETE FROM Instructor WHERE InstructorID = $userID";
    $row =$dbconn->query($sql);
    if ($row) {
        // Delete successful
        echo "<script>alert('Instructor deleted successfully.');
            window.location.href = 'http://localhost/finalFront/dashboard/instructors_home.php';
            </script>";
    } else {
        // Delete failed
        echo "<script>alert(' Error deleting instructor: " . $dbconn->error . "');
            window.location.href = 'http://localhost/finalFront/dashboard/instructors_home.php';
            </script>";
    }
}
function countStudentsInCourse($courseID)
{
    global $dbconn;

    $sql = "SELECT COUNT(*) AS studentCount FROM Student_Course WHERE CourseID = $courseID";
    $result = $dbconn->query($sql);
    $row = $result->fetch_assoc();
    $studentCount = $row['studentCount'];
    return $studentCount;
}
function countCoursesInStudent($studentID)
{
    global $dbconn;

    $sql = "SELECT COUNT(*) AS courseCount FROM Student_Course WHERE StudentID = $studentID";
    $result = $dbconn->query($sql);
    $row = $result->fetch_assoc();
    $courseCount = $row['courseCount'];
    return $courseCount;
}
function getInstructorDataByCourseID($courseID)
{
    global $dbconn;
    $sql = "SELECT Instructor.* 
            FROM Instructor
            INNER JOIN Course_Instructor ON Instructor.InstructorID = Course_Instructor.InstructorID
            WHERE Course_Instructor.CourseID = $courseID";

    $instructors = array();
    $result = $dbconn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $instructors[] = $row;
    }
    return $instructors;
}

function getCoursesDataByStudentID($studentID)
{
    global $dbconn;
    $sql = "SELECT Course.*
            FROM Course
            INNER JOIN Student_Course ON Course.CourseID = Student_Course.CourseID
            WHERE Student_Course.StudentID = $studentID";

    $courses = array();
    $result = $dbconn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
    return $courses;
}
function getCoursesDataByInstructorID($instructorID)
{
    global $dbconn;
    $sql = "SELECT Course.* 
            FROM Course
            INNER JOIN Course_Instructor ON Course.CourseID = Course_Instructor.CourseID
            WHERE Course_Instructor.InstructorID = $instructorID";

    $courses = array();
    $result = $dbconn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
    return $courses;
}

function checkAvailability($courseId, $instructorId) {
    global $dbconn;
    $sql = "SELECT availability FROM Course_Instructor WHERE CourseID = $courseId AND InstructorID = $instructorId";
    // Fetch the availability value from the result
    $result = $dbconn->query($sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $availability = $row['availability'];
      
        return $availability;
    } else {
        return null;
    }
}
function instructorIsAssigned($instructorID, $courseID)
{
    global $dbconn;
    $sql = "SELECT COUNT(*) as count FROM Course_Instructor WHERE InstructorID = $instructorID AND CourseID = $courseID";
    $result = $dbconn->query($sql);
    $row = $result->fetch_assoc();
    $count = $row['count'];
    return ($count > 0);
}

?>
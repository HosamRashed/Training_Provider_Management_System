<?php
session_start();
require('../dbm.php');
$dbconn = new DatabaseManager;
$dbconn->connect();

function getCourseCard($courseID)
{
    global $dbconn; // Add this line to access the $dbconn object inside the function

    // Retrieve the course data based on the provided ID
    $sql = "SELECT * FROM Course WHERE CourseID = $courseID";
    $result = $dbconn->query($sql);
    if ($result && $result->num_rows > 0) {
        $course = $result->fetch_assoc();
        // Extract the course details
        $title = $course['Title'];
        $image = "assets/img/courses/course-1.jpg"; // Encode the image data
        $description = $course['Description'];
        $category = $course['Category'];

        // Retrieve the instructor information for the course
        $instructorQuery = "SELECT Instructor.* FROM Instructor
                            INNER JOIN Course_Instructor ON Instructor.InstructorID = Course_Instructor.InstructorID
                            WHERE Course_Instructor.CourseID = $courseID";
        $instructorResult = $dbconn->query($instructorQuery);
        if ($instructorResult && $instructorResult->num_rows > 0) {
            $instructor = $instructorResult->fetch_assoc();
            // Extract the instructor details
            $instructorName = $instructor['FirstName']; // Replace with the actual column name for the instructor's name
            $instructorImg = "assets/img/trainers/trainer-1.jpg"; // Replace with the actual column name for the instructor's name

        } else {
            $instructorName = 'Unknown Instructor';
            $instructorImg = NULL;
        }
    } else {
        $description = "not found";
    }

    // Generate the HTML card
    $card = '<div class="col-lg-4 col-md-6 d-flex align-items-stretch">';
    $card .= '<div class="course-item">';
    $card .= '<img src="'.$image.'" class="img-fluid" alt="Course Image">'; // Decode and display the image

    $card .= '<div class="course-content">';
    $card .= '<div class="d-flex justify-content-between align-items-center mb-3">';
    $card .= '<h4>' . $category . '</h4>';
    $card .= '</div>';
    $card .= '<h3><a href="courseDetails.php?courseID=' . $courseID . '">' . $title . '</a></h3>'; // Add the courseID to the URL
    $card .= '<p>' . $description . '</p>';
    $card .= '<div class="trainer d-flex justify-content-between align-items-center">';
    $card .= '<div class="trainer-profile d-flex align-items-center">';
    $card .= '<img src="'.$instructorImg.'" class="img-fluid" alt="Instructor Image">'; // Decode and display the image

    $card .= '<span>' . $instructorName . '</span>';
    $card .= '</div>';
    $card .= '</div>';
    $card .= '</div>';
    $card .= '</div>';
    $card .= '</div>';

    // Close the database connection

    return $card;
}
function getInstructorCard($InstructorCard)
{
   

    global $dbconn; // Add this line to access the $dbconn object inside the function

    // Retrieve the course data based on the provided ID
    $sql = "SELECT * FROM Instructor WHERE InstructorID = $InstructorCard";
    $result = $dbconn->query($sql);

    if ($result && $result->num_rows > 0) {
        $instructor = $result->fetch_assoc();
        // Extract the course details
        $firstName = $instructor['FirstName'];
        $lastName = $instructor['LastName'];
        $gander = $instructor['Gender'];
        $birthDate = $instructor['Birthdate'];
        $status = $instructor['Status'];
        $email = $instructor['Email'];
        $phone = $instructor['Phone'];
        $password = $instructor['Password'];
        $img = "assets/img/trainers/trainer-1.jpg"; // Encode the image data
        $specialization = $instructor['Specialization'];
        $description = $instructor['Description'];
    }
    else {
        $description ="not found";

    }
    // Generate the HTML card
    $card = '<div class="col-lg-4 col-md-6 d-flex align-items-stretch">';
    $card .= '<div class="member">';
    $card .= '<img src="' . $img . '" class="img-fluid" alt="Instructor Image">'; 
    $card .= '<div class="member-content">'; 
    $card .= '<h4>'.$firstName. ' ' .$lastName.'</h4>'; 
    $card .= '<span>'.$specialization.'</span>'; 
    $card .= '<p>' .$description. '</p>';
    $card .= '</div>';
    $card .= '</div>';
    $card .= '</div>';


    // Close the database connection

    return $card;
}

function getUser($userID)
{
    global $dbconn;

    $sql = "SELECT * FROM student WHERE StudentID = $userID";
    $result = $dbconn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return null; // or handle the case when no result is found
    }
}

function getInstructors($courseID)
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

function getCourse($courseID)
{
    global $dbconn;

    $sql = "SELECT * FROM course WHERE CourseID = $courseID";
    $result = $dbconn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return null; // or handle the case when no result is found
    }
}

function updateUser($userId, $firstName, $lastName, $gender, $email, $birthdate)
{
    global $dbconn;

    $sql = "UPDATE student SET FirstName = '$firstName', LastName = '$lastName', Gender = '$gender', Email = '$email', Birthdate = '$birthdate' WHERE StudentID = $userId";
    $result = $dbconn->query($sql);

    if ($result) {
        return true;
    } else {
        return false;
    }
}


function displayTableRow($courseID) { ?>
    <tr>
        <td><?php echo $courseID ?></td>
    </tr>
<?php }


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
?>

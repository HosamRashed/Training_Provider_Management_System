<!DOCTYPE html>
<html lang="en">

<?php include 'head.inc.php'; ?>


<body>
  <?php
  $courseID = $_GET['courseID'];

  $course = getCourse($courseID);
  $Title = $course['Title'];
  $description = $course['Description'];
  $startDate = $course['StartDate'];
  $endDate = $course['EndDate'];
  $courseImg = "assets/img/courses/course-1.jpg";
  $instructorArray = getInstructors($courseID);

  ?>
  <?php include 'navBar.inc.php'; ?>


  <main id="main">
    <div class="mainContainer" data-aos="fade-in">
      <div class="container">
        <h2>Course Details</h2>
        <p>
          Our course details provide comprehensive information about each
          course, including the course description and learning objectives.
          You'll find all the necessary information to make informed decisions
          about which courses align with your interests and goals.
        </p>
      </div>
    </div>

    <section id="course-details" class="course-details">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-8">
            <?php
            echo '<img src="' . $courseImg . '" class="img-fluid" alt="Course Image">';
            echo " <h3> $Title  </h3>";
            echo "<p> $description </p>";
            ?>
          </div>
          <div class="col-lg-4">
            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Start date</h5>
              <?php
              echo "<p> $startDate </p>";
              ?>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>End date</h5>
              <?php
              echo "<p> $endDate </p>";
              ?>
            </div>
            <?php
            if (isset($_SESSION['user_id'])) {
              $user_id = $_SESSION['user_id'];
              $user = getUser($user_id);
            }
            $alterQuery = "SELECT * FROM student_course WHERE CourseID = $courseID AND StudentID = $user_id";
            $result = $dbconn->query($alterQuery);

            if ($result && $result->num_rows > 0) {
              echo '<div class="d-flex justify-content-between align-items-center">
                                <a onclick="return UnenrollCourse()" href="UnenrollCourse.php?course_id=' . $courseID . '&user_id=' . $user_id . '" class="enrollbtn">Unenroll</a>
                            </div>';
            } else {
              echo '<div class="d-flex justify-content-between align-items-center">
                                <a onclick="return enrollCourse()" href="enrollCourse_process.php?course_id=' . $courseID . '&user_id=' . $user_id . ' " class="enrollbtn">Enroll</a>
                            </div>';
            }
            ?>
          </div>
        </div>
      </div>
      </div>
    </section>

    <section id="cource-details-tabs" class="cource-details-tabs">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">

              <?php
              foreach ($instructorArray as $index => $tab) {
               
                  $tabId = 'tab-' . ($index + 1);
                  $isActive = ($index === 0) ? 'active show' : '';
                  $instructor = $instructorArray[$index];
                $availability = checkAvailability($courseID, $instructor['InstructorID']);
                if ($availability == 'available') {
                  

                  // Access the instructor data for the current tab
                
                  ?>
                  <li class="nav-item">
                    <a class="nav-link <?php echo $isActive; ?>" data-bs-toggle="tab" href="#<?php echo $tabId; ?>">
                      <?php echo $instructor['FirstName'] . " " . $instructor['LastName']; ?>
                    </a>
                  </li>
                  <?php
                }
              }
              ?>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <?php

              foreach ($instructorArray as $index => $tab) {
                $tabId = 'tab-' . ($index + 1);
                  $isActive = ($index === 0) ? 'active show' : '';
                  // Access the instructor data for the current tab
                  $instructor = $instructorArray[$index];
                $availability = checkAvailability($courseID, $instructor['InstructorID']);
                if ($availability == 'available') {

                  
                  ?>
                  <div class="tab-pane <?php echo $isActive; ?>" id="<?php echo $tabId; ?>">
                    <div class="row">
                      <div class="col-lg-8 details order-2 order-lg-1">
                        <h3>
                          <?php echo $instructor['FirstName'] . " " . $instructor['LastName']; ?>
                        </h3>
                        <p>
                          <?php echo $instructor['Description']; ?>
                        </p>
                      </div>
                      <div class="col-lg-4 text-center order-1 order-lg-2">
                        <?php
                        $instructorImg = 'assets/img/trainers/trainer-1.jpg';
                        echo '<img src="' . $instructorImg . '" class="img-fluid" alt="Course Image">';
                        ?>
                      </div>
                    </div>
                  </div>
                  <?php
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>




  </main>

  <?php include('footer.inc.php') ?>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script> -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

  <script src="assets/js/main.js"></script>
  <script>
    function enrollCourse() {
      if (confirm('Are you sure you want to enroll in this course?')) {
        return true; // Allow the link to be followed
      } else {
        return false; // Prevent the link from being followed
      }
    }
    function UnenrollCourse() {
      if (confirm('Are you sure you want to unenroll from this course?')) {
        return true; // Allow the link to be followed
      } else {
        return false; // Prevent the link from being followed
      }
    }
  </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.inc.php'; ?>

<body>
  <?php include 'navBar.inc.php'; ?>

  <main id="main" data-aos="fade-in">
    <div class="mainContainer">
      <div class="container">
        <h2>Your Courses</h2>
        <p>
          Discover a world of growth and opportunity through our comprehensive
          range of courses. From practical skills to personal development, our
          expert-led programs empower you to expand your knowledge and reach
          your full potential.
        </p>
      </div>
    </div>

    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">
        <div class="row">

          <div class="col-lg-2 d-flex justify-content-center mb-3">
          </div>

          <div class="col-lg-8 d-flex justify-content-center mb-3">
            <div class="search-container">
              <input type="text" id="searchInput" placeholder="Search.." name="search" />
            </div>
          </div>

          <div class="col-lg-2 d-flex justify-content-center mb-3">
          </div>

        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <?php
          // Assuming you have a database connection established
          
          // Get the student ID from the session
          $studentID = $_SESSION['user_id']; // Replace 'user_id' with the actual session variable storing the student ID
          
          // Query to fetch the courses associated with the logged-in student
          $sql = "SELECT c.* FROM Course c
                    INNER JOIN Student_Course sc ON c.CourseID = sc.CourseID
                    WHERE sc.StudentID = $studentID
                    ORDER BY c.CourseID DESC LIMIT 6";

          $result = $dbconn->query($sql);

          // Loop through the result and display the course cards
          while ($row = $result->fetch_assoc()) {
            $courseID = $row['CourseID'];
            $courseCard = getCourseCard($courseID);
            echo $courseCard;
          }
          ?>

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
    document.addEventListener("DOMContentLoaded", function () {
      // Select the search input element
      const searchInput = document.getElementById("searchInput");

      // Add event listener for the "input" event
      searchInput.addEventListener("input", function (event) {
        const searchTerm = event.target.value.toLowerCase();

        // Select all the course cards
        const courseCards = document.querySelectorAll(".course-item");

        // Loop through each course card and check if the title contains the search term
        courseCards.forEach(function (courseCard) {
          const titleElement = courseCard.querySelector("h3 a");
          const title = titleElement.textContent.toLowerCase();

          if (title.includes(searchTerm)) {
            courseCard.style.display = "block";
          } else {
            courseCard.style.display = "none";
          }
        });
      });
    });
  </script>
</body>

</html>
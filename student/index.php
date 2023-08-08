
<!DOCTYPE html>
<html lang="en">
<?php include 'head.inc.php'; ?>

  <body>
    <?php include 'navBar.inc.php'; ?>
    
    <section id="hero" class="d-flex justify-content-center align-items-center">
      <div
        class="container position-relative"
        data-aos="zoom-in"
        data-aos-delay="100"
      >
        <h1>Educate Today,<br />Lead Tomorrow</h1>
        <h2>
          Explore a diverse range of courses on this website, taught by multiple
          experienced trainers.
        </h2>
        <a href="courses.php" class="btn-get-started">Get Started</a>
      </div>
    </section>

    <main id="main">
      <section id="popular-courses" class="courses">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Courses</h2>
            <p>New Courses</p>
          </div>

          <div class="row" data-aos="zoom-in" data-aos-delay="100">

          <?php
            // Assuming you have a database connection established
            $sql = "SELECT * FROM Course ORDER BY CourseID DESC LIMIT 6";
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

      <section id="trainers" class="trainers">
        <div class="container" data-aos="fade-up">
          <div class="row" data-aos="zoom-in" data-aos-delay="100">

          <?php
            // Assuming you have a database connection established
            $sql = "SELECT * FROM instructor ORDER BY InstructorID DESC LIMIT 6";
            $result = $dbconn->query($sql);
            // Loop through the result and display the course cards
            while ($row = $result->fetch_assoc()) {
                $InstructorID = $row['InstructorID'];
                $InstructorCard = getInstructorCard($InstructorID);
                echo $InstructorCard;
            }
            ?>



            

            

          </div>
        </div>
      </section>

      <section id="why-us" class="why-us">
        <div class="container" data-aos="fade-up">
          <div class="row">
            <div class="col-lg-4 d-flex align-items-stretch">
              <div class="content">
                <h3>Why Choose Us?</h3>
                <p>
                  Discover the advantages of our website for online courses.
                  With a diverse range of expert trainers, you'll receive
                  top-quality education in an interactive learning environment.
                  Join our supportive community and access courses conveniently
                  from anywhere, empowering you to achieve your goals.
                </p>
                <div class="text-center">
                  <a href="about.php" class="more-btn"
                    >Learn More <i class="bx bx-chevron-right"></i
                  ></a>
                </div>
              </div>
            </div>
            <div
              class="col-lg-8 d-flex align-items-stretch"
              data-aos="zoom-in"
              data-aos-delay="100"
            >
              <div class="icon-boxes d-flex flex-column justify-content-center">
                <div class="row">
                  <div class="col-xl-4 d-flex align-items-stretch">
                    <div class="icon-box mt-4 mt-xl-0">
                      <i class="bx bx-receipt"></i>
                      <h4>Diverse course selection</h4>
                      <p>
                        Discover a wealth of courses covering various subjects,
                        providing you with a diverse learning experience.
                      </p>
                    </div>
                  </div>
                  <div class="col-xl-4 d-flex align-items-stretch">
                    <div class="icon-box mt-4 mt-xl-0">
                      <i class="bx bx-cube-alt"></i>
                      <h4>Expert trainers</h4>
                      <p>
                        Learn from expert trainers who bring extensive industry
                        experience and knowledge to provide you with top-quality
                        instruction.
                      </p>
                    </div>
                  </div>
                  <div class="col-xl-4 d-flex align-items-stretch">
                    <div class="icon-box mt-4 mt-xl-0">
                      <i class="bx bx-images"></i>
                      <h4>Convenient online learning experience</h4>
                      <p>
                        Flexible and accessible online learning that fits your
                        schedule.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- End #main -->
    <?php include 'footer.inc.php'; ?>
  
    <div id="preloader"></div>
    <a
      href="#"
      class="back-to-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script> -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

    <script src="assets/js/main.js"></script>
  </body>
</html>

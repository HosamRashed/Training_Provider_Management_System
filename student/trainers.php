<!DOCTYPE html>
<html lang="en">
<?php include 'head.inc.php'; ?>

  <body>
  <?php include 'navBar.inc.php'; ?>


    <main id="main" data-aos="fade-in">
      <div class="mainContainer">
        <div class="container">
          <h2>Trainers</h2>
          <p>
            Our highly qualified trainers bring extensive industry experience,
            deep knowledge, and a passion for teaching. They use effective
            methodologies, interactive techniques, and real-life examples to
            provide an engaging and enriching learning experience. With their
            guidance, you'll acquire practical skills, valuable insights, and
            the confidence to excel in your field.
          </p>
        </div>
      </div>

      <section id="trainers" class="trainers">
        <div class="container" data-aos="fade-up">
          <div class="row" data-aos="zoom-in" data-aos-delay="100">
            
          <?php
            // Assuming you have a database connection established
            $sql = "SELECT * FROM instructor ORDER BY InstructorID DESC";
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

    </main>

    <?php include('footer.inc.php') ?>

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

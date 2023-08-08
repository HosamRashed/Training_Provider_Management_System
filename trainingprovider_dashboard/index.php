

<!DOCTYPE html>
<html lang="en">

<?php include('head.inc.php');?>

<body>
  <div class="container-scroller">
    <?php include('navBar.inc.php') ?> 
    <!-- NAV DONE ----------------------------------------------------------- -->
    <main>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include('sidBar.inc.php') ?> 

        <!-- partial -->
        <section class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-sm-12">
                <div class="home-tab">
                  <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab"
                          aria-controls="overview" aria-selected="true">Overview</a>
                      </li>
                    </ul>
                  </div>
                  <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="statistics-details d-flex align-items-center justify-content-between">
                            <div>
                              <p class="statistics-title">Students</p>
                              <?php
                              echo '<h3 class="rate-percentage">' . getStudentNumber() . '</h3>';
                              ?>
                            </div>
                            <div>
                              <p class="statistics-title">Instructors</p>
                              <?php
                              echo '<h3 class="rate-percentage">' . getInstructorNumber() . '</h3>';
                              ?>
                            </div>
                            
                            <div>
                              <p class="statistics-title">Courses</p>
                              <?php
                              echo '<h3 class="rate-percentage">' . getCourseNumber() . '</h3>';
                              ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row flex-grow">
                        <div class="col-4 grid-margin stretch-card">
                          <div class="card card-rounded">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                      <h4 class="card-title card-title-dash">Last Student</h4>
                                    </div>
                                  </div>
                                  <div class="mt-3">
                                    <?php
                                    $lastStudents = getLast10Students(); // Assuming getLastStudents() returns the last 10 students
                                    foreach ($lastStudents as $student) {
                                      ?>
                                      <div
                                        class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                        <div class="d-flex">
                                        <img src="../student/assets/img/students/4.jpg" class="img-sm rounded-10" alt="StudentImg"> 
                                          <?php
                                                    echo '<div class="wrapper ms-3">';
                                          echo '  <p class="ms-1 mb-1 fw-bold">' . $student['FirstName'] . " " . $student['LastName'] . '</p>';
                                          echo ' <small class="text-muted mb-0">' . $student['Email'] . '</small>';
                                          ?>
                                        </div>
                                      </div>
                                    </div>

                                    <?php
                                    }
                                    ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-4 grid-margin stretch-card">
                        <div class="card card-rounded">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                  <div>
                                    <h4 class="card-title card-title-dash">Last instructors</h4>
                                  </div>
                                </div>
                                <div class="mt-3">

                                  <?php
                                  $lastInstructors = getLast10Instructors(); // Assuming getLastStudents() returns the last 10 students
                                  foreach ($lastInstructors as $instructor) {
                                    ?>
                                    <div
                                      class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                      <div class="d-flex">
                                      <img src="../student/assets/img/trainers/trainer-1.jpg" class="img-sm rounded-10" alt="instructorImg" />

                                        <?php
                              
                                        echo '<div class="wrapper ms-3">';
                                        echo '<p class="ms-1 mb-1 fw-bold">' . $instructor['FirstName'] . " " . $instructor['LastName'] . '</p>';
                                        echo '<small class="text-muted mb-0">' . $instructor['Email'] . '</small>';
                                        ?>
                                      </div>
                                    </div>

                                  </div>
                                  <?php
                                  }
                                  ?>



                              </div>


                            </div>
                          </div>
                        </div>
                      </div>
                    </div>



                    <div class="col-4 grid-margin stretch-card">
                      <div class="card card-rounded">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                  <h4 class="card-title card-title-dash">Last courses</h4>
                                </div>
                              </div>
                              <div class="mt-3">

                                <?php
                                $lastCourses = getLast10Courses(); // Assuming getLastStudents() returns the last 10 students
                                foreach ($lastCourses as $course) {
                                  ?>
                                  <div
                                    class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                    <div class="d-flex">
                                    <img src="../student/assets/img/courses/course-1.jpg" class="img-sm rounded-10" alt="courseImg" />

                                      <?php
                                     
                                      echo '<div class="wrapper ms-3">';
                                      echo '<p class="ms-1 mb-1 fw-bold">' . $course['Title'] . '</p>';
                                      echo '<small class="text-muted mb-0">' . $course['Category'] . '</small>';
                                      ?>
                                    </div>
                                  </div>

                                </div>
                                <?php
                                }
                                ?>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
  </div>
  </div>
  </section>
  </main>

  </div>
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  <?php include('footer.inc.php') ?> 

  <!-- partial -->
  </div>
  <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

</body>

</html>
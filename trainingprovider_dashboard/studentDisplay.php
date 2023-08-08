<?php
if (isset($_GET['Student_id'])) {
  $studentID = $_GET['Student_id'];
}
?>


<!DOCTYPE html>
<html lang="en">

<?php include('head.inc.php');
?>


<body>
  <div class="container-scroller">
    <!-- first section nav bar  -->
    <?php include('navBar.inc.php');
    $student = getStudent($studentID);
    ?>

    <!-- end of firstr section  -->

    <!-- second section  -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <section class="sidebar sidebar-offcanvas" id="sideBar">
        <?php include('sidBar.inc.php'); ?>

      </section>
      <!-- end second section  -->

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <section id="table">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tbody>
                          <tr>
                            <td class="py-1 ">
                              <img style="width: 15rem; height: 15rem; margin-left: 1rem;" src="../student/assets/img/students/4.jpg"
                                alt="image" />
                            </td>
                            <td class="py-xl-3">
                              <div class="card ">
                                <div class="card-body">
                                  <h4 class="card-title">Student Information</h4>
                                  <div>
                                    <p class="card-description">
                                      Personal info
                                    </p>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group row">
                                          <label class="col-sm-3 col-form-label">First
                                            Name</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                              value="<?php echo $student['FirstName']; ?>" readonly />
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group row">
                                          <label class="col-sm-3 col-form-label">Last
                                            Name</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                              value="<?php echo $student['LastName']; ?>" readonly />
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group row">
                                          <label class="col-sm-3 col-form-label">Gender</label>
                                          <div class="col-sm-9">
                                            <select class="form-control" disabled>
                                              <option <?php if ($student['Gender'] == 'Male')
                                                echo 'selected'; ?>>Male
                                              </option>
                                              <option <?php if ($student['Gender'] == 'Female')
                                                echo 'selected'; ?>>
                                                Female</option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group row">
                                          <label class="col-sm-3 col-form-label">Date
                                            of Birth</label>
                                          <div class="col-sm-9">
                                            <input class="form-control" placeholder="dd/mm/yyyy"
                                              value="<?php echo $student['Birthdate']; ?>" readonly />
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group row">
                                          <label class="col-sm-3 col-form-label">Status</label>
                                          <div class="col-sm-4">
                                            <div class="form-check">
                                              <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="membershipRadios"
                                                  id="membershipRadios1" value="active" <?php if ($student['Status'] === 'Active')
                                                    echo 'checked'; ?> disabled>
                                                Active
                                              </label>
                                            </div>
                                          </div>
                                          <div class="col-sm-5">
                                            <div class="form-check">
                                              <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="membershipRadios"
                                                  id="membershipRadios2" value="Inactive" <?php if ($student['Status'] === 'Inactive')
                                                    echo 'checked'; ?> disabled>
                                                Inactive
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group row">
                                          <label class="col-sm-3 col-form-label">Email</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                              value="<?php echo $student['Email']; ?>" readonly />
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                  </div>
                                </div>
                              </div>
                            </td>
                          </tr>
                        </tbody>

                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <section id="table">
              <div class="col-lg-12 col-md-12 grid-margin stretch-card">
                <!-- Table ------------------------- -->
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">
                      Courses</h4>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Students Enroled</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php
                          $courses = getCoursesDataByStudentID($studentID);
                          foreach ($courses as $course) {

                            ?>
                            <tr>
                              <?php
                              $studentCount = countStudentsInCourse($course['CourseID']);
                              echo '<td> ' . $course['Title'] . '</td>';
                              echo '<td>' . $course['Category'] . '</td>';
                              echo '<td>' . $studentCount . '</td>';
                              echo '<td>' . $course['StartDate'] . '</td>';
                              echo '<td>' . $course['EndDate'] . '</td>';
                              echo '<td>' . $course['Status'] . '</td>';
                              ?>
                              <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="courseDisplay.php?course_id=<?php echo $course['CourseID']; ?>" type="button"
                                    class="btn btn-behance">
                                    <i class="ti-eye"></i>
                                  </a>

                                </div>
                              </td>
                            </tr>
                            <?php
                          }
                          ?>



                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

              </div>
            </section>

          </div>

        </div>

        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include('footer.inc.php'); ?>

        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

</body>

</html>
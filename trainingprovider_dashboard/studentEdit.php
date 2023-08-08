<?php
if (isset($_GET['Student_id'])) {
  $studentID = $_GET['Student_id'];
}
?>


<!DOCTYPE html>
<html lang="en">
<?php include('head.inc.php'); ?>



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
      <main class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <section id="form">
              <form method="POST" action="studentEdit_Procces.php">
                <div class="col-1"></div>
                <div class="col-10 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Student Information</h4>
                      <form >
                        <p class="card-description">
                          Personal info
                        </p>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">First Name</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" value="<?php echo $student['FirstName']; ?>"
                                  disabled />
                                <input type="hidden" id="user_id" name="user_id" value="<?php echo $studentID; ?>">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Last Name</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" value="<?php echo $student['LastName']; ?>"
                                  disabled />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Email</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" value="<?php echo $student['Email']; ?>"
                                  disabled />
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
                                        echo 'checked'; ?>>
                                    Active
                                  </label>
                                </div>
                              </div>
                              <div class="col-sm-5">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="membershipRadios"
                                      id="membershipRadios2" value="Inactive" <?php if ($student['Status'] === 'Inactive')
                                        echo 'checked'; ?>>
                                    Inactive
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <button type="submit" name="submit" id="submit" class="btn btn-primary me-2">Submit</button>
                        <button type="button" class="btn btn-secondary" onclick="window.location.href = 'http://localhost/hSchool/trainingprovider_dashboard/studentHomePage.php';">Cancel</button>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="col-1"></div>
              </form>
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
                              $courseID = $course['CourseID'];
                              ?>
                              <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="courseDisplay.php?course_id=<?php echo $course['CourseID']; ?>" type="button"
                                    class="btn btn-behance">
                                    <i class="ti-eye"></i>
                                  </a>
                                  <a onclick="return UnenrollCourse()" href="studentCourseDelete_Procces.php?course_id=<?php echo $courseID ?>&user_id=<?php echo $studentID ?>" type="button" class="btn btn-danger">

                                    <i class="ti-trash"></i>
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

        <?php include('footer.inc.php'); ?>

      </main>
    </div>
  </div>


</body>

</html>
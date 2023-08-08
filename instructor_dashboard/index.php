<!DOCTYPE html>
<html lang="en">

<?php include('head.inc.php'); ?>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <!-- first section nav bar  -->
    <?php include('navBar.inc.php');
    ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->

      <section class="sidebar sidebar-offcanvas" id="sideBar">
        <?php include('sidBar.inc.php');
        $instructorID = $_SESSION['user_id'];
        ?>

      </section>
      <!-- end second section  -->
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <!-- OUR --------------------------------------------------------------------------------------- -->
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <h4 class="card-title">Courses</h4>
                    </div>
                    
                  </div>
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
                          <th>Availabity</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $courses = getCoursesDataByInstructorID($instructorID);
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
                            echo '<td>';
                            $availability = checkAvailability($course['CourseID'], $instructorID);
                            if ($availability == 'available') {
                              echo 'Available';
                            } else {
                              echo 'Not Available';
                            }
                            echo '</td>'; ?>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="courseDisplay.php?course_id=<?php echo $course['CourseID']; ?>" type="button"
                                  class="btn btn-behance">
                                  <i class="ti-eye"></i>
                                </a>
                                <a href="courseEdit.php?course_id=<?php echo $course['CourseID']; ?>&instructor_id=<?php echo $instructorID; ?>"
                                  type="button" class="btn btn-success">
                                  <i class="ti-pencil"></i>
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


  <script>
    function deleteItem() {
      if (confirm('Are you sure you want to delete this course?')) {
        return true; // Allow the link to be followed
      } else {
        return false; // Prevent the link from being followed
      }
    }
  </script>
</body>

</html>
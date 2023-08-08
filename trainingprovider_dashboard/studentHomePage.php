<!DOCTYPE html>
<html lang="en">

<?php include('head.inc.php'); ?>

<body>
  <div class="container-scroller">
    <!-- first section nav bar  -->
    <?php include('navBar.inc.php'); ?>

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
                    <h4 class="card-title">Students</h4>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>
                              User
                            </th>
                            <th>
                              Name
                            </th>
                            <th>
                              Enroled Courses
                            </th>
                            <th>
                              Status
                            </th>
                            <th>
                              Actions
                            </th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php
                          $students = getLastAllStudent();
                          foreach ($students as $student) {
                            $count = countCoursesInStudent($student['StudentID']);
                            ?>


                            <tr>
                              <td class="py-1">
                                <img src="../student/assets/img/students/4.jpg" alt="image" />
                              </td>
                              <td>
                                <?php echo $student['FirstName'] . ' ' . $student['LastName']; ?>
                              </td>
                              <td>
                                <div class="">
                                  <?php echo $count ?>
                                </div>
                              </td>
                              <td>
                                <?php echo $student['Status']; ?>

                              </td>
                              </td>
                              <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="studentDisplay.php?Student_id=<?php echo $student['StudentID']; ?>" type="button"
                                    class="btn btn-behance">
                                    <i class="ti-eye"></i>
                                  </a>
                                  <a href="studentEdit.php?Student_id=<?php echo $student['StudentID']; ?>" type="button"
                                    class="btn btn-success
                                  ">
                                    <i class="ti-pencil"></i>
                                  </a>
                                  <a href="studentDelete_Procces.php?student_id=<?php echo $student['StudentID']; ?>"
                                    class="btn btn-danger" onclick="return deleteItem();">
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
      if (confirm('Are you sure you want to delete this instructor?')) {
        return true; // Allow the link to be followed
      } else {
        return false; // Prevent the link from being followed
      }
    }
  </script>
</body>

</html>
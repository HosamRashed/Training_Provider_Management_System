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
                    <div class="row">
                      <div class="col-9">
                        <h4 class="card-title">Instructors</h4>
                      </div>
                      <div class="col-3">
                        <a href="instructorCreate.php" class="btn btn-primary text-white mb-0 me-0 " type="button"><i
                            class="mdi mdi-account-plus"></i>Add new Instructor</a>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>
                              User
                            </th>
                            <th>
                              First name
                            </th>
                            <th>
                              Specialization
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
                          $instructors = getAllInstructors();
                          foreach ($instructors as $instructor) {
                            $instructorImg = "../student/assets/img/trainers/trainer-1.jpg";

                            ?>
                            <tr>
                              <td class="py-1">
                                <?php
                                echo '<img src="' . $instructorImg . '" alt="image" />';
                                ?>
                              </td>
                              <td>
                                <?php echo $instructor['FirstName'] . ' ' . $instructor['LastName']; ?>
                              </td>
                              <td>
                                <div class="">
                                  <?php echo $instructor['Specialization']; ?>
                                </div>
                              </td>
                              <td>
                                <!-- <label class="badge badge-warning">In progress</label> -->
                                <?php echo $instructor['Status']; ?>
                              </td>
                              </td>
                              <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="instructorDisplay.php?instructor_id=<?php echo $instructor['InstructorID']; ?>"
                                    type="button" class="btn btn-behance">
                                    <i class="ti-eye"></i>
                                  </a>

                                  <a href="instructorEdit.php?instructor_id=<?php echo $instructor['InstructorID']; ?>"
                                    type="button" class="btn btn-success">
                                    <i class="ti-pencil"></i>
                                  </a>

                                  <a href="instructorDelete_procces.php?instructor_id=<?php echo $instructor['InstructorID']; ?>"
                                    class="btn btn-danger"
                                    onclick="return deleteItem();">
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
        <?php include('footer.inc.php') ?>
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
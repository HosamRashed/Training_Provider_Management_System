<!DOCTYPE html>
<html lang="en">

<?php include('head.inc.php'); ?>


<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include('navBar.inc.php'); ?>


    <div class="container-fluid page-body-wrapper">
      <section class="sidebar sidebar-offcanvas" id="sideBar">
        <?php include('sidBar.inc.php'); ?>

      </section>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <form method="POST" action="courseCreate_Procces.php">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Course Information</h4>

                    <p class="card-description">Main info</p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Title</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="title" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Image</label>
                          <div class="col-sm-9">
                            <input type="file" id="img" name="img" accept="image/*" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Category</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="category">
                              <option>Programming</option>
                              <option>Media</option>
                              <option>Other</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Description</label>
                          <div class="col-sm-9">
                            <input class="form-control" name="description" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Start Date</label>
                          <div class="col-sm-9">
                            <input type="Date" class="form-control" name="startDate" placeholder="dd/mm/yyyy" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">End Date</label>
                          <div class="col-sm-9">
                            <input type="Date" class="form-control" name="endDate" placeholder="dd/mm/yyyy" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Status</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" value="Active" checked>
                                Active
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" value="Inactive">
                                Inactive
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button type="button" class="btn btn-secondary"
                      onclick="window.location.href = 'http://localhost/hSchool/trainingprovider_dashboard/courseHomePage.php';">Cancel</button>
                  </div>
                </div>
              </div>
          </div>

          <!-- <div class="col-1"></div> -->
          <!-- <div class="col-1"></div> -->
          <!-- Table ------------------------- -->
          <section id="table">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <h4 class="card-title">Instructors</h4>
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
                              echo '<img src="' . $instructorImg . ' " alt="image" />';
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

                              <?php echo $instructor['Status']; ?>
                            </td>
                            </td>
                            <td>
                              <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="instructorIDs[]"
                                  value="<?php echo $instructor['InstructorID']; ?>">
                                <label class="form-check-label">Assign</label>
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

          </form>

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
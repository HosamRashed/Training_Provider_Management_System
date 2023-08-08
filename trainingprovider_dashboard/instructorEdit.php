<?php
if (isset($_GET['instructor_id'])) {
    $instructorID = $_GET['instructor_id'];
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include('head.inc.php'); ?>


<body>
    <div class="container-scroller">
        <!-- first section nav bar  -->
        <?php include('navBar.inc.php');
        $instructor = getInstructor($instructorID);
        $instructorImg = "../student/assets/img/trainers/trainer-1.jpg";

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
      <form method="POST" action="instructorEdit_Procces.php">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <td class="py-1">
                          <?php
                          echo '<img style="width: 15rem; height: 15rem; margin-left: 1rem;" src="' . $instructorImg . '" alt="image" />';
                          ?>
                        </td>
                        <td class="py-xl-3">
                          <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Instructor Information</h4>
                              <div >
                                <p class="card-description">Personal info</p>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">First Name</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $instructor['FirstName']; ?>" />
                                        <input type="hidden" id = "user_id" name="user_id" value="<?php echo $instructorID; ?>">

                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Last Name</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $instructor['LastName']; ?>" />
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Gender</label>
                                      <div class="col-sm-9">
                                        <select class="form-control" id="gender" name="gender">
                                          <option <?php if ($instructor['Gender'] == 'Male') echo 'selected'; ?>>Male</option>
                                          <option <?php if ($instructor['Gender'] == 'Female') echo 'selected'; ?>>Female</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Date of Birth</label>
                                      <div class="col-sm-9">
                                        <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" value="<?php echo $instructor['Birthdate']; ?>" />
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
                                            <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="active" <?php if ($instructor['Status'] == 'Active') echo 'checked="checked"'; ?>>
                                            Active
                                          </label>
                                        </div>
                                      </div>
                                      <div class="col-sm-5">
                                        <div class="form-check">
                                          <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="Inactive" <?php if ($instructor['Status'] == 'Inactive') echo 'checked="checked"'; ?>>
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
                                        <input class="form-control" id="email" name="email" placeholder="example@example.com" value="<?php echo $instructor['Email']; ?>" />
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Specialization</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" id="specialization" name="specialization" value="<?php echo $instructor['Specialization']; ?>" />
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Password</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" id="password" name="password" value="<?php echo $instructor['Password']; ?>" />
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Phone</label>
                                      <div class="col-sm-9">
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" value="<?php echo $instructor['Phone']; ?>" />
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary" name = "submit" id="submit">Submit</button>
                                <button type="button" class="btn btn-secondary" onclick="window.location.href = 'http://localhost/hSchool/trainingprovider_dashboard/instructorHomePage.php';">Cancel</button>
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
        </form>
      </section>
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
        // Get the buttons by their IDs
        const submitBtn = document.getElementById('submitBtn');
        const cancelBtn = document.getElementById('cancelBtn');

        // Add event listeners to the buttons
        submitBtn.addEventListener('click', function () {
            // Call the updateInstructor function with the provided userID
            updateInstructor(<?php $instructorID ?>);
        });

        cancelBtn.addEventListener('click', function () {
            // Redirect to the specified URL
            window.location.href = 'http://localhost/finalFront/dashboard/instructors_home.php';
        });
    </script>
</body>

</html>
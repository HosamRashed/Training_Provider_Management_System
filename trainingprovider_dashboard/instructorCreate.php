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
                                        <div class="table-responsive">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Instructor Information</h4>
                                                    <div>
                                                        <p class="card-description">Personal info</p>
                                                        <form method="POST" action="instructorCreate_Procces.php">

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label"
                                                                            for="firstname">First Name</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control"
                                                                                id="firstname" name="firstname" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label"
                                                                            for="lastname">Last Name</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control"
                                                                                id="lastname" name="lastname" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label"
                                                                            for="gender">Gender</label>
                                                                        <div class="col-sm-9">
                                                                            <select class="form-control" id="gender"
                                                                                name="gender">
                                                                                <option>Male</option>
                                                                                <option>Female</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label"
                                                                            for="dateOfBirth">Date of Birth</label>
                                                                        <div class="col-sm-9">
                                                                            <input class="form-control" type="Date"
                                                                                id="dateOfBirth" name="dateOfBirth"
                                                                                placeholder="dd/mm/yyyy"
                                                                                value="01/01/2000" />
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
                                            <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="active" checked="checked" ?>
                                            Active
                                          </label>
                                        </div>
                                      </div>
                                      <div class="col-sm-5">
                                        <div class="form-check">
                                          <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="Inactive" >
                                            Inactive
                                          </label>
                                        </div>
                                      </div>
                                    </div>

                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label"
                                                                            for="email">Email</label>
                                                                        <div class="col-sm-9">
                                                                            <input class="form-control" id="email"
                                                                                name="email"
                                                                                placeholder="example@example.com" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label"
                                                                            for="specialization">Specialisation</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control"
                                                                                id="specialization"
                                                                                name="specialization" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label"
                                                                            for="password">Password</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control"
                                                                                id="password" name="password" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label"
                                                                            for="phone">Phone</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="tel" class="form-control"
                                                                                id="phone" name="phone" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label"
                                                                            for="phone">Description</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control"
                                                                                id="discription" name="discription" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label"
                                                                            for="image">Image</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="file" name="img"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <button type="submit" name="submit" id="submit"
                                                                        class="btn btn-primary ">Submit</button>

                                                                    <button type="button"
                                                                        class="btn btn-secondary ">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

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
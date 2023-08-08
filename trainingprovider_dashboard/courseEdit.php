<?php
if (isset($_GET['course_id'])) {
    $courseID = $_GET['course_id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include('head.inc.php'); ?>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <header>
            <?php include('navBar.inc.php');
            $course = getCourse($courseID);
            $courseImg = "../student/assets/img/courses/course-1.jpg";
            ?>

        </header>

        <div class="container-fluid page-body-wrapper">
            <section class="sidebar sidebar-offcanvas" id="sideBar">
                <?php include('sidBar.inc.php'); ?>

            </section>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <form method="POST" action="courseEdit_Procces.php">
                            <div class="col-12 grid-margin ">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td class="py-1">
                                                            <?php
                                                            echo '<img style="width: 15rem; height: 15rem; margin-left: 1rem;" src="' . $courseImg . '" "alt="image" />';
                                                            ?>
                                                        </td>
                                                        <td class="py-xl-3">
                                                            <p class="card-description">
                                                                Main info
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-3 col-form-label">Title</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control"
                                                                                name="title"
                                                                                value="<?php echo $course['Title']; ?>" />
                                                                            <input type="hidden" id="courseID"
                                                                                name="courseID"
                                                                                value="<?php echo $course['CourseID']; ?>">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-3 col-form-label">Category</label>
                                                                        <div class="col-sm-9">
                                                                            <select class="form-control"
                                                                                name="category">
                                                                                <option>
                                                                                    <?php echo $course['Category']; ?>
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-3 col-form-label">Description</label>
                                                                        <div class="col-sm-9">
                                                                            <input class="form-control"
                                                                                name="description"
                                                                                value="<?php echo $course['Description']; ?>" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Start
                                                                            Date</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="date" class="form-control"
                                                                                placeholder="dd/mm/yyyy"
                                                                                name="startDate"
                                                                                value="<?php echo $course['StartDate']; ?>" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">End
                                                                            Date</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="date" class="form-control"
                                                                                placeholder="dd/mm/yyyy" name="endDate"
                                                                                value="<?php echo $course['EndDate']; ?>" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-3 col-form-label">Status</label>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <input type="radio"
                                                                                        class="form-check-input"
                                                                                        name="status"
                                                                                        id="membershipRadios1"
                                                                                        value="active" <?php if ($course['Status'] == 'Active')
                                                                                            echo 'checked'; ?>>
                                                                                    Active
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-5">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <input type="radio"
                                                                                        class="form-check-input"
                                                                                        name="status"
                                                                                        id="membershipRadios2"
                                                                                        value="Inactive" <?php if ($course['Status'] == 'Inactive')
                                                                                            echo 'checked'; ?>>
                                                                                    Disabled
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Submit</button>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        onclick="window.location.href = 'http://localhost/hSchool/trainingprovider_dashboard/courseHomePage.php';">Cancel</button>

                                                                </div>
                                                            </div>
                        </form>
                        </td>
                        </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

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
                                            Action
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
                                            <td>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" name="instructorIDs[]" value="<?php echo $instructor['InstructorID']; ?>" <?php if (instructorIsAssigned($instructor['InstructorID'], $courseID)) echo 'checked'; ?>>
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
                    </form>
                </div>
            </div>
        </section>



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
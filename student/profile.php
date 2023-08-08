<!DOCTYPE html>
<html lang="en">
<?php include 'head.inc.php'; ?>

<body>
<?php include 'navBar.inc.php'; ?>
    
    <?php
      if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        
        echo "<script>console.log('Course ID from session: $user_id');</script>";
    } else {
        echo "<script>console.log('Course ID is not set in the session.');</script>";
    }
    $user = getUser($user_id);
    $img = "assets/img/students/4.jpg"; // Encode the image data
      ?>

<main id="mainProfile" >
    <div class="row gutters">
    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
    <div class="card h-100">
        <div class="card-body">
            <div class="account-settings">
                <div class="user-profile">
                    <div class="user-avatar">
                        <?php 
                        echo('<img src="' . $img . '" alt="Student image">');
                        ?> 
                        </div>
                        <?php 
                        echo('<h5 class="user-name">'.$user['FirstName'].' '.$user['LastName'].'</h5>');
                        echo('<h6 class="user-email">'.$user['Email'].'</h6>');
                    ?>
                    
                </div>
                
            </div>
        </div>
    </div>
    </div>
    <!--  -->
    
    
    <div class="col-xl-9 col-lg-11 col-md-9 col-sm-12 col-12">
    <form method="POST" action="updateForm_process.php" >
    <div class="card h-100">
        <div class="card-body">
            <div class="row ">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h6 class="mb-2 text-primary">Personal Details</h6>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="First Name"> First Name</label>
                        

                        <?php 
                            echo('<input value="'.$user['FirstName'].'"type="text" class="form-control"  name="firstname" placeholder="Enter first name">');?>
                        
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="">Last name</label>
                        <?php 
                            echo('<input value="'.$user['LastName'].'"type="text" class="form-control" name="lastname" placeholder="Enter last name">');?>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" style="margin-top: 10px" id="gender" name="gender">
                        <option value="Male" <?php if ($user['Gender'] == 'Male') echo 'selected'; ?>>Male</option>
                        <option value="Female" <?php if ($user['Gender'] == 'Female') echo 'selected'; ?>>Female</option>
                    </select>
                </div>

                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="eMail">Email</label>
                        <?php 
                            echo('<input value="'.$user['Email'].'"type="text" class="form-control" name="email" placeholder="Enter email">');?>
                    </div> 
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                        <label for="birthday">Data of Birth</label>
                        <input type="date"
                        class="form-control"
                        id="dateOfBirth"
                        name="dateOfBirth"
                        value="<?php echo $user['Birthdate']; ?>" />
                    
                    </div> 
                </div>
            </div>
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="text-right">
                        <button type="submit" id="update-btn" style="margin-top: 2rem;" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
    </div>
    </div>
    </main>

    <?php include 'footer.inc.php'; ?> 



</body>
</html>
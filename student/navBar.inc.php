
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">
    <img class="logo" src="./Assets/Img/logo.png" alt />

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li>
          <a <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active"'; ?> href="index.php">Home</a>
        </li>
        <li>
          <a <?php if (basename($_SERVER['PHP_SELF']) == 'courses.php') echo 'class="active"'; ?> href="courses.php">Courses</a>
        </li>
        <li>
          <a <?php if (basename($_SERVER['PHP_SELF']) == 'trainers.php') echo 'class="active"'; ?> href="trainers.php">Trainers</a>
        </li>
        <li>
          <a <?php if (basename($_SERVER['PHP_SELF']) == 'contact.php') echo 'class="active"'; ?> href="contact.php">Contact Us</a>
        </li>
        <li>
          <a <?php if (basename($_SERVER['PHP_SELF']) == 'about.php') echo 'class="active"'; ?> href="about.php">About</a>
        </li>

        <?php
        // session_start();
        if (isset($_SESSION['user_id'])) {
          // User is logged in, display their image and information
          $user_id = $_SESSION['user_id'];
          $user = getUser($user_id);
          $img = "assets/img/students/4.jpg"; // Encode the image data
          $name = $user['FirstName'] . " " . $user['LastName'];
          $email = $user['Email'];


          echo '<li class="nav-item dropdown d-none d-lg-block user-dropdown">
          <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="img-xs rounded-circle" style="max-width: 5rem; width: 2.5rem;" src="'.$img.'" alt="Profile image"> </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <div class="dropdown-header text-center">
              <img class="img-md rounded-circle" style=" color:#184e77;  max-width: 5rem; width: 3rem;" src="' . $img . '" alt="Profile image">
              <p style=" color:#184e77;" class="mb-1 mt-3 font-weight-semibold">'. $name .'</p>
              <p style=" color:#184e77;" class="fw-light text-muted mb-0">'.$email.'</p>
            </div>
            <a  class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i><a style=" color:#184e77;" href="profile.php">Profile</a></a>
            <a  class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> <a style=" color:#184e77;"  href="myCourses.php">My courses</a> </a>
            <a  class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i><a style=" color:#184e77;" href="logout.php">Sign out</a></a>
          </div>
        </li>
      </ul>
    </nav>';
        } else {
          // User is not logged in, display the "Sign Up" button
          echo '</ul>
          </nav>
          <a href="login.php" class="get-started-btn">Log in</a>';
        }

        ?>
      </ul>
    </nav>
  </div>
</header>

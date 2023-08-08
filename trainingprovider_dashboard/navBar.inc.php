<?php
require('../dbm.php');
include('../dashboard.php');
$dbconn = new DatabaseManager;
$dbconn->connect();
session_start();
?>

<header>
      <?php
      if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        echo "<script>console.log('Course ID from session: $user_id');</script>";
      } else {
        $user_id = 1;
        echo "<script>console.log('Course ID is not set in the session.');</script>";
      }

      
        $user = getTrainingProvider($user_id);
      
      ?>
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
              <span class="icon-menu"></span>
            </button>
          </div>

          <div class="custom-navbar">
            <a class="navbar-brand brand-logo" href="index.php">
              <img src="../assets/images/logo.png" alt="logo" />
            </a>
          </div>

        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top">
          <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
              <?php
              echo '<h1 class=" welcome-text"> Good Morning, <span class="text-black fw-bold"> ' . $user['FirstName'] . " " . $user['LastName'] . '</span></h1>';
              ?>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
              <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="../student/assets/img/students/2.jpg"  class="img-xs rounded-circle" alt="Profile image" />

                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                  <div class="dropdown-header text-center">
                    <img src="../student/assets/img/students/2.jpg"  class="img-xs rounded-circle" alt="Profile image" />
                    <?php
                    echo '<p class="mb-1 mt-3 font-weight-semibold">' . $user["FirstName"] . ' ' . $user["LastName"] . ' </p>';
                    echo '<p class="fw-light text-muted mb-0">' . $user["Email"] . '</p>';
                    ?>
                  </div>
                  <a href="../student/logout.php" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign
                    Out</a>
                </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
    </header>

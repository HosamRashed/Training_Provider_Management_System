<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>H-SCHOOL</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet" />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <link href="assets/css/style.css" rel="stylesheet" />
  </head>
  <body>
    <div class="d-lg-flex half">
      <div class="bg order-1 order-md-2 hbg"></div>
      <div class="contents order-2 order-md-1">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7">
              <h3>Login to <strong>H-SCHOOL</strong></h3>
              <form action="login_process.php" method="get">
                <div class="form-group first">
                  <label for="email">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    placeholder="your-email@gmail.com"
                    id="email"
                    name="email"
                    required
                  />
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input
                    type="password"
                    class="form-control"
                    placeholder="Your Password"
                    id="password"
                    name="password"
                    required
                  />
                </div>

                <div class="d-flex mb-3 talign-items-center">
            
                  <span class="ml-auto"
                    ><a href="signup.php" class="forgot-pass">Sign Up</a></span
                  >
                </div>

                <input
                  type="submit"
                  value="Log In"
                  class="btn btn-block btnColor"
                />
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>

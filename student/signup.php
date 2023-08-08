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
              <h3>
                SIGN UP TO
                <strong>
                  <span style="color: #34A0A4">H</span
                  ><span style="color: #1A759F">-SCHOOL</span></strong
                >
              </h3>
              <form method="POST" action="registration-process.php" onsubmit="return validateForm()">
    <div class="form-group first">
        <label for="firstName">First Name</label>
        <input type="text" class="form-control" id="firstName" name="firstName" />
    </div>

    <div class="form-group first">
        <label for="lastName">Last Name</label>
        <input type="text" class="form-control" id="lastName" name="lastName" />
    </div>

    <div class="form-group first">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" />
    </div>

    <div class="form-group first">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" />
    </div>

    <div class="form-group row">
        <label class="col-sm-3 col-form-label" style="margin-top: 10px">Gender</label>
        <div class="col-sm-9">
            <select class="form-control" style="margin-top: 10px" id="gender" name="gender">
                <option>Male</option>
                <option>Female</option>
            </select>
        </div>
    </div>

    <div class="form-group last mb-3">
    <label for="dateOfBirth">Date of Birth</label>
    <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" />
</div>

    <div class="form-group last mb-3">
        <label for="password">Password</label>
        <input type="password" class="form-control" placeholder="Your Password" id="password" name="password" />
    </div>
    <div class="d-flex mb-3 talign-items-center">
            
            <span class="ml-auto"
              ><a href="login.php" class="forgot-pass">Already registrated? Log in</a></span
            >
          </div>
    <div class="form-group row">
        <input type="submit" value="SIGN UP" class="col-sm-12 btn btn-block btnColor" style="color: #d9ed92" />
    </div>
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
    <script>
        function validateForm() {
            var inputs = document.querySelectorAll("input[type=text], input[type=password], select ,input[type=date]");
            var isValid = true;

            for (var i = 0; i < inputs.length; i++) {
                var input = inputs[i];
                if (input.value.trim() === "") {
                    input.classList.add("error");
                    isValid = false;
                } else {
                    input.classList.remove("error");
                }
            }

            if (!isValid) {
                alert("Please fill in all the fields.");
                return false; // Prevent form submission
            }
        }
    </script>
  </body>
</html>

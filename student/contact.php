<!DOCTYPE html>
<html lang="en">
<?php include 'head.inc.php'; ?>

  <body>
    <?php include 'navBar.inc.php'; ?>

    <main id="main">
      <div class="mainContainer" data-aos="fade-in">
        <div class="container">
          <h2>Contact Us</h2>
          <p>
            Contact us today to explore our online courses and connect with our
            experienced trainers. We're here to assist you on your learning
            journey.
          </p>
        </div>
      </div>

      <section id="contact" class="contact">
        <div data-aos="fade-up">
          <iframe
            style="border: 0; width: 100%; height: 350px"
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d101.6419004!3d2.9277715!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd0f74e8ad10f1129!2sMultimedia%20University%20-%20MMU%20Cyberjaya!5e0!3m2!1sen!2smy!4v1624782776604"
            frameborder="0"
            allowfullscreen
          ></iframe>
        </div>

        <div class="container" data-aos="fade-up">
          <div class="row mt-5">
            <div class="col-lg-4">
              <div class="info">
                <div class="address">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Location:</h4>
                  <p>63000 Multimedia Street, Cyberjaya, Selengor, Malaysia</p>
                </div>

                <div class="email">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>H-school@gmail.com</p>
                </div>

                <div class="phone">
                  <i class="bi bi-phone"></i>
                  <h4>Phone:</h4>
                  <p>+60 1139097845</p>
                </div>
              </div>
            </div>

            <div class="col-lg-8 mt-5 mt-lg-0">
              <form
                action="forms/contact.php"
                method="post"
                role="form"
                class="php-email-form"
              >
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input
                      type="text"
                      name="name"
                      class="form-control"
                      id="name"
                      placeholder="Your Name"
                      required
                    />
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input
                      type="email"
                      class="form-control"
                      name="email"
                      id="email"
                      placeholder="Your Email"
                      required
                    />
                  </div>
                </div>
                <div class="form-group mt-3">
                  <input
                    type="text"
                    class="form-control"
                    name="subject"
                    id="subject"
                    placeholder="Subject"
                    required
                    />
                </div>
                <div class="form-group mt-3">
                  <textarea
                    class="form-control"
                    name="message"
                    id="message"
                    rows="5"
                    placeholder="Message"
                    required
                  ></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent successfully!</div>
                </div>
                <div class="text-center">
                  <button type="submit" id="submit-btn">Send Message</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </main>

    <?php include 'footer.inc.php'; ?>

    <div id="preloader"></div>
    <a
      href="#"
      class="back-to-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script> -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

    <script src="assets/js/main.js"></script>

    <script>
      // Add event listener to the form submit button
      document.getElementById("submit-btn").addEventListener("click", function(event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        // Check if all required fields are filled
        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var subject = document.getElementById("subject").value;
        var message = document.getElementById("message").value;

        if (name && email && subject && message) {
          // Display the success message
          document.querySelector(".sent-message").style.display = "block";
        }
      });
    </script>
  </body>
</html>
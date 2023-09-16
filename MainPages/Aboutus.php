

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" type="image/x-icon" href="../Images/betaicon3.png" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beta Academy</title>
    <style>
      .navbar {
        border: 1px solid white;
        background-color: white;
      }
      @media (max-width: 768px) {
        .hide-on-sm {
          display: none;
        }
      }
      .bold-large {
        font-weight: bold;
        font-size: 1.2rem;
      }
      .no-caret::after {
        display: none;
      }
      @media (max-width: 767.98px) {
        .d-md-flex {
          display: none !important;
        }
      }
    </style>
    <link rel="stylesheet" href="../CSS/bootstrap.min.css" />
    <link rel="stylesheet" href="../CSS/style.css" />
  </head>
  <body>
   
  <?php include '../Components/NormalNavbar.php'; ?>


    <div class="container">
      <div class="row">
        <div class="col" style="margin-top: 100px">
          <h1 style="color: #382d8b">Beta Engineering Training Academy</h1>
        </div>
      </div>

      <div class="row" style="margin-top: 50px">
        <h3 style="color: #382d8b">Overview</h3>
        <p style="font-size: large">
          Beta Academy is a Training Center that aims to develop students'
          skills in Technical & Non-technical Engineering Fields and Management
          and Soft skills.You can find here more Workshops & Courses & Mega
          Programs in engineering & Management fields. And Helping them Online
          By Facebook page, in addition, to helping in their Career.
        </p>
      </div>

      <div class="row" style="margin-top: 30px">
        <h3 style="color: #382d8b">Specialties</h3>
        <p style="font-size: large">
          Engineering, Soft Skills, Management, Career, Communication,
          Programming, Architecture , Construction, Embedded Systems, Software
          Tools, Mechanics , and Automotive
        </p>
      </div>

      <div class="row" style="margin-top: 30px">
        <h3 style="color: #382d8b">Connect With Us</h3>

        <div class="row" style="margin-top: 20px">
          <a
            class="icon-link icon-link-hover"
            style="
              --bs-icon-link-transform: translate3d(0, -0.125rem, 0);
              text-decoration: none;
              font-size: large;
              color: black;
              font-weight: bold;
            "
            target="_blank"
            href="https://www.facebook.com/BetaAcademy.B"
          >
            <img
              src="../Images/facebook.png"
              alt="Icon"
              class="icon me-2"
              style="height: 35px"
            />
            Facebook
          </a>
        </div>

        <div class="row" style="margin-top: 20px">
          <a
            class="icon-link icon-link-hover"
            style="
              --bs-icon-link-transform: translate3d(0, -0.125rem, 0);
              text-decoration: none;
              font-size: large;
              color: black;
              font-weight: bold;
            "
            target="_blank"
            href="https://www.linkedin.com/company/beta-training-academy/"
          >
            <img
              src="../Images/linkedin.png"
              alt="Icon"
              class="icon me-2"
              style="height: 35px"
            />
            Linkedin
          </a>
        </div>

        <div class="row" style="margin-top: 20px">
          <a
            class="icon-link icon-link-hover"
            style="
              --bs-icon-link-transform: translate3d(0, -0.125rem, 0);
              text-decoration: none;
              font-size: large;
              color: black;
              font-weight: bold;
            "
            target="_blank"
            href="mailto:betaacademy18@gmail.com"
          >
            <img
              src="../Images/email.png"
              alt="Icon"
              class="icon me-2"
              style="height: 35px"
            />
            Email
          </a>
        </div>

        <div class="row" style="margin-top: 20px">
          <a
            class="icon-link icon-link-hover"
            style="
              --bs-icon-link-transform: translate3d(0, -0.125rem, 0);
              text-decoration: none;
              font-size: large;
              color: black;
              font-weight: bold;
            "
            target="_blank"
            href="tel:01120127810"
          >
            <img
              src="../Images/phone.png"
              alt="Icon"
              class="icon me-2"
              style="height: 35px"
            />
            Phone
          </a>
        </div>

        <div class="row" style="margin-top: 20px">
          <a
            class="icon-link icon-link-hover"
            style="
              --bs-icon-link-transform: translate3d(0, -0.125rem, 0);
              text-decoration: none;
              font-size: large;
              color: black;
              font-weight: bold;
            "
            target="_blank"
            href="https://goo.gl/maps/B83JYyfRy5kArB8v6"
          >
            <img
              src="../Images/location.png"
              alt="Icon"
              class="icon me-2"
              style="height: 35px"
            />
            Location
          </a>
        </div>
      </div>
    </div>
    
    <?php
       include '../Components/Footer.php';
    ?>
    <div style="height: 70px"></div>
    <script src="../JS/bootstrap.min.js"></script>
  </body>
</html>

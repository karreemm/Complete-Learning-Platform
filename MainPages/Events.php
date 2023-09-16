
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



    <div
      class="container text-center"
      style="margin-top: 100px; font-weight: bold; color: #382d8b"
    >
      <h1 style="margin-right: 50px">Our Events</h1>
    </div>

    <div
      class="container"
      style="margin-top: 50px; font-weight: bold; color: #382d8b"
    >
      <h2 style="margin-right: 50px">Our Last Event :</h2>
    </div>

    <div class="container text-center">
      <div class="row">
        <div class="col-md-12">
          <img
            src="../Images/Event.jpg"
            alt="Image"
            class="custom-image hide-on-sm"
            style="width: 100%; height: 300px; margin-top: 50px"
          />
        </div>
      </div>
      <div class="row justify-content-md-center">
        <div class="col-md-10" style="margin-top: 20px">
          <p class="text-center fs-3" style="font-family: sans-serif">
            We cordially invite you to our third annual event designed
            exclusively to assist in your precise departmental choice within the
            Faculty of Engineering. A live-streamed occasion featuring expert
            speakers from all departments, this event will unfold from July 7th
            to July 14th at 8:30 AM. Their insights will illuminate your
            academic path, ensuring your decision is both confident and
            well-informed. Stay tuned for the forthcoming schedule as you embark
            on this crucial step toward your future.
          </p>
        </div>
      </div>
    </div>

    <div
      class="container"
      style="margin-top: 100px; font-weight: bold; color: #382d8b"
    >
      <h2 style="margin-right: 50px">The schedule :</h2>
    </div>

    <div class="container text-center">
      <div class="row">
        <div class="col-md-6" style="margin-top: 270px">
          <h1 style="font-size: 2cm">Excited To</h1>
          <h1 style="font-size: 2cm">See You</h1>
        </div>

        <div class="col-md-6">
          <img
            src="../Images/Event scedule.jpg"
            alt="Image"
            class="custom-image hide-on-sm"
            style="height: 600px; margin-top: 50px; width: 600px"
          />
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

<?php include '../Components/NormalNavbar.php'; ?>

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

    <div
      class="container text-center"
      style="margin-top: 100px; font-weight: bold; color: #382d8b"
    >
      <h1 style="margin-right: 50px">Our Diplomas :</h1>
    </div>

    <div style="margin-top: 60px">
      <div class="container-fluid" style="margin: 5px">
        <div class="row" style="margin: 5px">
          <?php 
            $flag2='diploma';
             $sql2="SELECT * FROM diplomas";
             $result2=$conn->query($sql2); while($row =
          $result2->fetch_assoc()){  echo "
            <div class='col-md-4'>
                <div class='card'>
                    <img
                        src='../CardImages/{$row['c_image1']}'
                        class='card-img-top'
                        alt='Image 1'
                    />
                    <div class='card-body'>
                        <h5 class='card-title'>{$row['c_name']}</h5>
                        <p class='card-text'>{$row['c_details']}</p>
                        <a
                            href='../MainPages/DiplomaDetails.php?cid={$row['c_id']}&flag={$flag2}'
                            class='btn btn-primary'
                        >
                            More Details
                        </a>
                    </div>
                </div>
            </div>"; } ?>
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

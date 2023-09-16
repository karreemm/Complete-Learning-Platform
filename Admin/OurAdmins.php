<?php

include '../Components/NormalNavbar.php';
?>

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
      <h1 style="margin-right: 50px">Our Current Admins</h1>
    </div>

    <div class="container" style="margin-top: 30px">
      <div class="row">
        <table class="table table-info">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Controls</th>
             
            </tr>
          </thead>
          <tbody>
            <?php

                $sql3="SELECT * FROM admins";
                $result3=$conn->query($sql3); 
            while($row3=$result3->fetch_assoc()){ echo "
              <tr>
                <td>{$row3['id']}</td>
                <td>{$row3['username']}</td>
                <td>{$row3['email']}</td>
                <td>
                  
                  <a
                    class='btn btn-sm btn-outline-danger'
                    href='../Admin/DeleteAdmins.php?aid={$row3['id']}'
                  >
                    Delete
                  </a>
                </td>
              </tr>
              ";}  ?>
          </tbody>
        </table>
      </div>
    </div>


    <?php
       include '../Components/Footer.php';
    ?>
    <div style="height: 70px"></div>
    <script src="../JS/bootstrap.min.js"></script>
  </body>
</html>
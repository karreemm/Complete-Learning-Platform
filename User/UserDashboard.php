<?php
 include '../Components/NormalNavbar.php'; 
$uid = $_SESSION['uid'];
if(! isset($_SESSION["loggedin"])){
  header("Location: ../LogIn/Signup.php");
 }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" type="image/x-icon" href="../Images/betaicon3.png" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beta Academy</title>
    <style>
     @media (max-width: 768px) {
        body {
          overflow-x: hidden;
        }
      }
      @media (max-width: 991px) {
        #container {
          background-color: white !important;
        }
      }
      .form-control:focus {
        border-color: #2cb8ba;
        box-shadow: 0 0 0 0.2rem rgba(44, 184, 186, 0.25);
      }

      .btn:focus {
        border-color: #ff0055;
        box-shadow: 0 0 0 0.2rem rgba(154, 7, 65, 0.25);
      }

      .dotted-hr {
        border-top: 3px dotted #999;
        width: 90%;
        margin: 10px auto;
      }
      .rounded-container {
        margin-top: 40px;
        background-color: #e1e1ea;
        border-radius: 15px;
        overflow: hidden;
      }
      .navbar {
        border: 1px solid white;
        background-color: white;
      }
      @media (max-width: 1200px) {
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

      .custom-table {
    background-color: #c9d6f4;
    padding: 10px;
  }
  .table td {
    padding: 10px; 
  }
    </style>
    <link rel="stylesheet" href="../CSS/bootstrap.min.css" />
    <link rel="stylesheet" href="../CSS/style.css" />
  </head>
  <body>

  <div class="container" style="margin-top: 100px; margin-left: 40px">
      <div class="row">
        <div
          class="col-12 col-md-3 rounded-container"
          style="background-color: #c9d6f4; padding: 2.5rem; height: 500px"
        >
          <img
            src="../Images/student.png"
            alt="photo"
            style="height: 30px; margin-bottom: 0px"
          />
          <?php

          $sql = "SELECT username FROM users WHERE id = $uid";
          $result = $conn->query($sql);
          
          if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              
              
              echo '<h1 style="color: #382d8b; font-weight: bold; margin-bottom: 0px; font-family: \'Times New Roman\', Times, serif;">' . $row['username'] . '</h1>';
          } else {
              
              echo '<h1 style="color: #382d8b; font-weight: bold; margin-bottom: 0px; font-family: \'Times New Roman\', Times, serif;">User Not Found</h1>';
          }
          ?>

          <p
            style="
              margin-top: 30px;
              color: black;
              font-family: 'Times New Roman', Times, serif;
            "
          >
            After Joining, Let The Learning Adventure Begin
          </p>
          <div class="row no-gutters" style="margin-top: 180px">
            <div class="col-auto pr-0">
              <img
                src="../Images/email.png"
                alt="Your Image"
                class="img-fluid"
                style="height: 25px"
              />
            </div>
            <div class="col">
        <?php
               $sql = "SELECT email FROM users WHERE id = $uid";
               $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                 $row = $result->fetch_assoc();
                 echo '<p class="mb-0" style="font-family: \'Times New Roman\', Times, serif; color: #382d8b;">' . $row['email'] . '</p>';
                   } else {
                    echo '<p class="mb-0" style="font-family: \'Times New Roman\', Times, serif; color: #382d8b;">Email Not Found</p>';
                  }
        ?>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-9" >
        <div class=" rounded-container" 
        style="
            background-color: #c9d6f4;
            margin-left: 30px;
            padding: 2rem 1rem;
            height: 100px;
            font-family: 'Times New Roman', Times, serif;
          ">

          <h3
            style="
              color: #382d8b;
              font-weight: bold;
              margin-bottom: 0px;
              font-family: 'Times New Roman', Times, serif;
              text-align: center;
            "
          >
            Know Your Enrolled Courses & Diplomas
          </h3>
        </div>


  <div style="margin-left:30px; margin-top:50px;">
        <table class="table custom-table rounded-container">
            <thead>
                <tr>
                    
                    <th>Course Name</th>
                    <th>Duration</th>
                    <th>Price</th>
                    
                </tr>
            </thead>
               <tbody>
                  <?php
                     $uid = $_SESSION['uid'];

                          $sql1 = "SELECT courses.c_name, courses.c_duration, courses.c_price 
                          FROM `user-courses`
                          INNER JOIN courses ON `user-courses`.cid = courses.c_id
                          WHERE `user-courses`.userid = $uid";

                          $sql2 = "SELECT diplomas.c_name, diplomas.c_duration, diplomas.c_price 
                          FROM `user-diplomas`
                          INNER JOIN diplomas ON `user-diplomas`.cid = diplomas.c_id
                          WHERE `user-diplomas`.userid = $uid";

                          $result1 = $conn->query($sql1);

                          if ($result1 === false) {
                              echo "Error executing SQL query for courses: " . $conn->error;
                          } else {
    
                          while ($row = $result1->fetch_assoc()) {
                          echo "
                            <tr>
                               <td>" . $row["c_name"] . "</td>
                               <td>" . $row["c_duration"] . "</td>
                               <td>" . $row["c_price"] . "</td>
                            </tr>";}
                          }


                          $result2 = $conn->query($sql2);

                            if ($result2 === false) {
                                echo "Error executing SQL query for diplomas: " . $conn->error;
                            } else {
                                
                                while ($row = $result2->fetch_assoc()) {
                                    echo "
                                    <tr>
                                        <td>" . $row["c_name"] . "</td>
                                        <td>" . $row["c_duration"] . "</td>
                                        <td>" . $row["c_price"] . "</td>
                                    </tr>";
                                }
                            }
                  ?>
                </tbody>
            </table>
         </div>
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
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
      <h1 style="margin-right: 50px">Our Current Users</h1>
    </div>


    <div class="container" style="margin-top: 30px;">
        <table class="table table-info">
            <thead class="thead-dark">
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>WorkShops</th>
                    <th>Diplomas</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $userQuery = "SELECT id, username FROM users";
                    $userResult = mysqli_query($conn, $userQuery);

                    if (!$userResult) {
                        die("User query failed: " . mysqli_error($conn));
                    }

                    while ($userRow = mysqli_fetch_assoc($userResult)) {
                        $userId = $userRow['id'];

                        if ($userId == 8) {
                            continue;
                        }

                        $username = $userRow['username'];

                        $courseQuery = "SELECT cid FROM `user-courses` WHERE userid = $userId";
                        $courseResult = mysqli_query($conn, $courseQuery);

                        if (!$courseResult) {
                            die("Course query failed: " . mysqli_error($conn));
                        }

                        $diplomaQuery = "SELECT cid FROM `user-diplomas` WHERE userid = $userId";
                        $diplomaResult = mysqli_query($conn, $diplomaQuery);

                        if (!$diplomaResult) {
                            die("Diploma query failed: " . mysqli_error($conn));
                        }

                        $coursesFound = false;
                        $diplomasFound = false;

                        if (mysqli_num_rows($courseResult) > 0) {
                            $coursesFound = true;
                        }
                        if (mysqli_num_rows($diplomaResult) > 0) {
                            $diplomasFound = true;
                        }
                        echo "<tr>";
                        echo "<td>$userId</td>";
                        echo "<td>$username</td>";
                        echo "<td>";
                        if ($coursesFound) {
                            while ($courseRow = mysqli_fetch_assoc($courseResult)) {
                                $courseId = $courseRow['cid'];
                                $courseDetailsQuery = "SELECT c_name FROM courses WHERE c_id = $courseId";
                                $courseDetailsResult = mysqli_query($conn, $courseDetailsQuery);

                                if (!$courseDetailsResult) {
                                    die("Course details query failed: " . mysqli_error($conn));
                                }
                                $courseDetails = mysqli_fetch_assoc($courseDetailsResult);
                                echo $courseDetails['c_name'] . "<br>";
                            }
                        } else {
                            echo "There Are No Enrolled WorkShops";
                        }
                        echo "</td>";
                        echo "<td>";
                        if ($diplomasFound) {
                            while ($diplomaRow = mysqli_fetch_assoc($diplomaResult)) {
                                $diplomaId = $diplomaRow['cid'];
                                $diplomaDetailsQuery = "SELECT c_name FROM diplomas WHERE c_id = $diplomaId";
                                $diplomaDetailsResult = mysqli_query($conn, $diplomaDetailsQuery);

                                if (!$diplomaDetailsResult) {
                                    die("Diploma details query failed: " . mysqli_error($conn));
                                }

                                $diplomaDetails = mysqli_fetch_assoc($diplomaDetailsResult);
                                echo $diplomaDetails['c_name'] . "<br>";
                            }
                        } else {
                            echo "There Are No Enrolled Diplomas";
                        }
                        echo "</td>";
                        echo "</tr>";
                    }

                ?>



            </tbody>
        </table>
    </div>


    <?php
       include '../Components/Footer.php';
    ?>
    <div style="height: 70px"></div>
    <script src="../JS/bootstrap.min.js"></script>
  </body>
</html>
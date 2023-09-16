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
  
            <?php

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $courseCountQuery = "SELECT cid, COUNT(userid) AS user_count FROM `user-courses` GROUP BY cid";
                $courseCountResult = mysqli_query($conn, $courseCountQuery);

                if (!$courseCountResult) {
                    die("Course count query failed: " . mysqli_error($conn));
                }

                $diplomaCountQuery = "SELECT cid, COUNT(userid) AS user_count FROM `user-diplomas` GROUP BY cid";
                $diplomaCountResult = mysqli_query($conn, $diplomaCountQuery);

                if (!$diplomaCountResult) {
                    die("Diploma count query failed: " . mysqli_error($conn));
                }

                $courseCounts = [];
                while ($courseCountRow = mysqli_fetch_assoc($courseCountResult)) {
                    $courseId = $courseCountRow['cid'];
                    $userCount = $courseCountRow['user_count'];
                    $courseCounts[$courseId] = $userCount;
                }

                $diplomaCounts = [];
                while ($diplomaCountRow = mysqli_fetch_assoc($diplomaCountResult)) {
                    $diplomaId = $diplomaCountRow['cid'];
                    $userCount = $diplomaCountRow['user_count'];
                    $diplomaCounts[$diplomaId] = $userCount;
                }

            ?>

<div class="container">
    <div
      class="container text-center"
      style="margin-top: 100px; font-weight: bold; color: #382d8b"
    >
      <h1 style="margin-right: 50px"> Workshops Statistics</h1>
    </div>
    <table class="table table-info" style="margin-top: 30px;">
        <thead>
            <tr>
                <th>WorkShop ID</th>
                <th>WorkShop Name</th>
                <th>Enrolled Users</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($courseCounts as $courseId => $userCount) {
                $courseNameQuery = "SELECT c_name FROM courses WHERE c_id = $courseId";
                $courseNameResult = mysqli_query($conn, $courseNameQuery);
                $courseNameRow = mysqli_fetch_assoc($courseNameResult);
                $courseName = $courseNameRow['c_name'];

                echo "<tr>";
                echo "<td>$courseId</td>";
                echo "<td>$courseName</td>";
                echo "<td>$userCount</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <div
      class="container text-center"
      style="margin-top: 100px; font-weight: bold; color: #382d8b"
    >
      <h1 style="margin-right: 50px"> Diplomas Statistics</h1>
    </div>
    <table class="table table-info" style="margin-top: 30px;">
        <thead>
            <tr>
                <th>Diploma ID</th>
                <th>Diploma Name</th>
                <th>Enrolled Users</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($diplomaCounts as $diplomaId => $userCount) {
                $diplomaNameQuery = "SELECT c_name FROM diplomas WHERE c_id = $diplomaId";
                $diplomaNameResult = mysqli_query($conn, $diplomaNameQuery);
                $diplomaNameRow = mysqli_fetch_assoc($diplomaNameResult);
                $diplomaName = $diplomaNameRow['c_name'];

                echo "<tr>";
                echo "<td>$diplomaId</td>";
                echo "<td>$diplomaName</td>";
                echo "<td>$userCount</td>";
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
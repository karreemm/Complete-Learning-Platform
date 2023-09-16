  <?php
 include '../Components/NormalNavbar.php'; 
$id=$_GET['cid'];
     $flag = $_GET['flag'];
     if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      $uid = $_SESSION['uid'];
  
  } else {
      echo "";
  }

  if (!isset($_SESSION['admin'])){
    $_SESSION['admin']= false;
}

     if($flag=='diploma'){
      $sql="SELECT * FROM diplomas WHERE c_id=$id";
      $result=$conn->query($sql);
      $row = $result->fetch_assoc();
     }   
     else if($flag== 'workshop'){
      $sql="SELECT * FROM courses WHERE c_id=$id";
      $result=$conn->query($sql);
      $row = $result->fetch_assoc();
     }

     if (isset($_POST['enroll'])) {
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['admin'] == true) {
        echo '<div class="alert alert-danger" role="alert" style="margin-top: 100px; text-align: center; line-height: 2; font-weight: bold;">
        This Process Is Not Allowed To You.
        </div>';
      } else if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ) {
          if ($flag == 'diploma') {
              
              $sql = "INSERT INTO `user-diplomas` (userid, cid) VALUES ('$uid', '$id')";
              $message = "Your Diploma Has Been Added To Your Collection Successfully.";
          } elseif ($flag == 'workshop') {
              
              $sql = "INSERT INTO `user-courses` (userid, cid) VALUES ('$uid', '$id')";
              $message = "Your Workshop Has Been Added To Your Collection Successfully.";
          }
  
          
          $duplicate_sql1 = "SELECT * FROM `user-courses` WHERE userid='$uid' AND cid='$id'";
          $result_duplicate1 = $conn->query($duplicate_sql1);

          $duplicate_sql2 = "SELECT * FROM `user-diplomas` WHERE userid='$uid' AND cid='$id'";
          $result_duplicate2 = $conn->query($duplicate_sql2);
  
          if ($result_duplicate1->num_rows > 0 && $flag=='workshop' ) {
              echo '<div class="alert alert-danger" role="alert" style="margin-top: 100px; text-align: center; line-height: 2; font-weight: bold;">
                  You Are Already Enrolled In This Workshop.
              </div>';
          } else if($result_duplicate2->num_rows > 0 && $flag=='diploma'){
            echo '<div class="alert alert-danger" role="alert" style="margin-top: 100px; text-align: center; line-height: 2; font-weight: bold;">
                  You Are Already Enrolled In This Diploma.
              </div>';
          }
          else {
              
              if ($conn->query($sql) === TRUE) {
                  echo '<div class="alert alert-success" role="alert" style="margin-top: 100px; text-align: center; line-height: 2; font-weight: bold;">
                      ' . $message . '
                  </div>';
              } else {
                  echo "Error: $sql <br> $conn->error ";
              }
          }
        } else{
          $displayAlert=true;
        }
      }
  
 
  if (isset($displayAlert)) {
      echo '<div class="alert alert-danger" role="alert" style="margin-top: 100px; text-align: center; line-height: 2; font-weight: bold;">
          Please Log In First
      </div>';
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
 


    <div class="container">
      <div class="row">
        <div class="col-md-7" style="margin-top: 100px">
          <h1 style="color: #382d8b"><?php echo $row['c_name']; ?></h1>
          <p style="margin-top: 30px; font-size: large">
           <?php echo $row['c_details'] ?>
          </p>
          <form method="post" action="">
          <input 
          type="submit"
          name="enroll"
          class="btn btn-primary"
          role="button"
          style="width: 40%; font-weight: bold"
          value="Enroll Now"  
          >
          </form>
          <div class="d-flex align-items-center">
            <p
              style="
                font-size: xx-large;
                font-weight: bold;
                margin-right: 10px;
                margin-top: 60px;
                color: #382d8b;
              "
            >
              Level
            </p>
            <p style="font-size: medium; margin-top: 60px">
              <?php echo $row['c_level']; ?>
            </p>
          </div>

          <div class="d-flex align-items-center">
            <p
              style="
                font-size: xx-large;
                font-weight: bold;
                margin-right: 10px;
                color: #382d8b;
              "
            >
              Instructor
            </p>
            <p style="font-size: medium">(Eng/ Omar Mahmoud)</p>
          </div>

          <div class="d-flex align-items-center">
            <p
              style="
                font-size: xx-large;
                font-weight: bold;
                margin-right: 10px;
                color: #382d8b;
              "
            >
              Duration
            </p>
            <p style="font-size: medium"> <?php echo $row['c_duration']; ?></p>
          </div>

          <div class="d-flex align-items-center">
            <p
              style="
                font-size: xx-large;
                font-weight: bold;
                margin-right: 10px;
                color: #382d8b;
              "
            >
              Price
            </p>
            <p style="font-size: medium"> <?php echo $row['c_price']; ?></p>
          </div>

          <div class="d-flex align-items-center">
            <p
              style="
                font-size: xx-large;
                font-weight: bold;
                margin-right: 10px;
                color: #382d8b;
              "
            >
              Certificate
            </p>
            <p style="font-size: medium"> <?php echo $row['c_certification']; ?></p>
          </div>

          <div class="d-flex align-items-center">
            <p
              style="
                font-size: xx-large;
                font-weight: bold;
                margin-right: 10px;
                color: #382d8b;
              "
            >
              What you'll learn
            </p>
            <p style="font-size: medium">
              <?php echo $row['c_learn']; ?>
            </p>
          </div>
        </div>
        
        <div class="col-md-5">
          <img
            src="../IconImages/<?php echo $row['c_image2']; ?>"
            alt="Image"
            class="custom-image hide-on-sm"
            style="height: 350px; margin-top: 130px; margin-left: 100px"
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

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

  include '../Components/NormalNavbar.php';

  if(isset($_POST["submit"])){

    $username= $_POST["username"];
    $email= $_POST["email"];
    $pass=$_POST['pass'];
    $pass=password_hash($pass, PASSWORD_DEFAULT);

    $sql1="INSERT INTO admins (username , email , pass) VALUES  ('$username' , '$email' , '$pass') ";
    

    if($conn->query($sql1) === TRUE){
        echo '<div class="alert alert-success" role="alert" style="margin-top: 100px; text-align: center; line-height: 2; font-weight: bold;">
        The New Admin Has Been Added Successfully
    </div>';
     } else{
      echo"Error: $sql <br> $conn->error ";
     }

   }

   ?>

    <div
      class="container text-center"
      style="margin-top: 100px; font-weight: bold; color: #382d8b"
    >
      <h1 style="margin-right: 50px">Add New Admins</h1>
    </div>

    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form  method="POST" action="">
                        <div class="form-group">
                            <label for="username" style="font-weight: bold;">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="email" style="font-weight: bold;">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password" style="font-weight: bold;">Password</label>
                            <input type="password" class="form-control" id="password" name="pass" required>
                        </div>
                        <div  class="text-center" style="margin-top: 10px;">
                        <input type="submit" class="btn btn-primary" value="Add" style="font-weight: bold; width: 80px;" name="submit">
                        </div>
                    </form>
                </div>
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
<?php
 include '../Components/db.php';
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" type="image/x-icon" href="../Images/betaicon3.png" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beta Academy</title>
    <style>
      html,
      body {
        width: 450px;
        height: 700px;
        margin: 20px auto;
        background-color: #f0f0f0;
      }
      .inline-container {
        display: flex;
        align-items: center;
      }

      .hr-line {
        flex: 1;
        margin: 0 10px;
        border: none;
        border-top: 1px solid black;
      }

      .text-start {
        margin: 0;
      }
      .link-offset-2 {
        margin-left: 2rem;
      }

      .link-offset-3-hover:hover {
        margin-left: 3rem;
      }
    </style>
    <link rel="stylesheet" href="../CSS/bootstrap.min.css" />
  </head>
  <body>

  <?php

if (isset($_POST['email']) && isset($_POST['pass'])) {
  $email = $_POST['email'];
  $pass = $_POST['pass'];

  $sql2 = "SELECT * FROM admins WHERE email='$email'";
  $result2 = $conn->query($sql2);

  if ($result2->num_rows >= 1) {
      $row = $result2->fetch_assoc();

      if (password_verify($pass, $row['pass'])) {
          $_SESSION['loggedin'] = true;
          $_SESSION['admin'] = true;
          $_SESSION['email'] = $email;
          $_SESSION['uid'] = $row['id'];
          header("Location: ../Admin/Dashboard.php");
      } else {
        echo"<div class='alert alert-danger' role='alert' style='text-align: center; line-height: 2; font-weight: bold;'>
        Wrong Password
      </div> ";
      }
  } else {
      $sql = "SELECT * FROM users WHERE email='$email'";
      $result = $conn->query($sql);

      if ($result->num_rows >= 1) {
          $row = $result->fetch_assoc();

          if (password_verify($pass, $row['pass'])) {
              $_SESSION['loggedin'] = true;
              $_SESSION['email'] = $email;
              $_SESSION['uid'] = $row['id'];

              if ($email === 'admin1@gmail.com' && $pass === 'admin12345') {
                  $_SESSION['admin'] = true;
                  header("Location: ../Admin/Dashboard.php");
              } else {
                  header("Location: ../User/UserDashboard.php");
              }

          } else {
            echo"<div class='alert alert-danger' role='alert' style='text-align: center; line-height: 2; font-weight: bold;'>
            Wrong Password
          </div> ";
          }
      } else {
        echo"<div class='alert alert-danger' role='alert' style='text-align: center; line-height: 2; font-weight: bold;'>
        User Doesn not Exist
      </div> ";
      }
  }
}
?>

    <p class="text-center fs-2" style="color: #382d8b">Welcome Back</p>
    <form style="margin: 20px" method="post" action="">
      <div class="mb-3">
        <label
          for="exampleInputEmail1"
          class="form-label"
          style="font-weight: bold"
          >Email
        </label>
        <input
        name="email"
          type="email"
          class="form-control"
          id="exampleInputEmail1"
          aria-describedby="emailHelp"
        />
      </div>
      <div class="mb-3">
        <label
          for="exampleInputPassword1"
          class="form-label"
          style="font-weight: bold"
          >Password</label
        >
        <input
        name="pass"
          type="password"
          class="form-control"
          id="exampleInputPassword1"
        />
        <a
          class="link-opacity-100"
          href="#"
          style="font-size: small; text-decoration: none"
        >
          Forgot Password?
        </a>
      </div>

      <input name="login" type="submit" class="btn btn-primary" style="width: 410px; font-weight: bold;" value="Log In">
       

      <div class="inline-container" style="margin-top: 20px">
        <hr class="hr-line" />
        <p class="text-start" style="font-size: x-small">Or</p>
        <hr class="hr-line" />
      </div>

      <button
        type="button"
        class="btn btn-light btn-lg"
        style="
          margin-top: 20px;
          border-color: black;
          width: 410px;
          font-size: medium;
          font-weight: bold;
          height: 50px;
        "
      >
        <div class="row">
          <div class="col-md- d-flex align-items-center">
            <img
              src="../Images/googleicon.png"
              alt="Icon"
              class="icon me-2"
              style="height: 30px; margin-bottom: 8px"
            />
            <p style="margin-left: 55px">Continue With Google</p>
          </div>
        </div>
      </button>
      <button
        type="button"
        class="btn btn-light btn-lg"
        style="
          margin-top: 20px;
          border-color: black;
          width: 410px;
          font-size: medium;
          font-weight: bold;
          height: 50px;
        "
      >
        <div class="row">
          <div class="col-md- d-flex align-items-center">
            <img
              src="../Images/facebookicon.png"
              alt="Icon"
              class="icon me-2"
              style="height: 30px; margin-bottom: 8px"
            />
            <p style="margin-left: 55px">Continue With Facebook</p>
          </div>
        </div>
      </button>
      <button
        type="button"
        class="btn btn-light btn-lg"
        style="
          margin-top: 20px;
          border-color: black;
          width: 410px;
          font-size: medium;
          font-weight: bold;
          height: 50px;
        "
      >
        <div class="row">
          <div class="col-md- d-flex align-items-center">
            <img
              src="../Images/appleicon.png"
              alt="Icon"
              class="icon me-2"
              style="height: 30px; margin-bottom: 8px"
            />
            <p style="margin-left: 55px">Continue With Apple</p>
          </div>
        </div>
      </button>

      <div class="container text-center">
        <div class="row justify-content-md-center">
          <div class="col col-lg-6">
            <div class="d-flex justify-content-center align-items-center">
              <p
                class="text-center"
                style="margin-top: 20px; font-size: medium"
              >
                New To Beta?
              </p>
              <a
                class="link-opacity-100"
                href="../LogIn/Signup.php"
                style="font-size: small; margin-left: 4px"
                >Sign Up</a
              >
            </div>
          </div>
        </div>
      </div>
    </form>

    <script src="../JS/bootstrap.min.js"></script>
  </body>
</html>

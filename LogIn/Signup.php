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
        height: 750px;
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
   include '../Components/db.php';
   if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pass']) ){

    $username=$_POST['username'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $pass=password_hash($pass, PASSWORD_DEFAULT);

    $sql="INSERT INTO users (username , email , pass) VALUES  ('$username' , '$email' , '$pass') ";
    if($conn->query($sql) === TRUE){ $_SESSION['loggedin']=true;
    $_SESSION['email']=$email; header("Location: ../LogIn/Login.php"); }
    else{ echo"Error: $sql <br />
    $conn->error "; } } ?>

    <p class="text-center fs-2" style="color: #382d8b">Sign Up</p>
    <form style="margin: 20px" method="post" action="">
      <div class="mb-3">
        <label for="text" class="form-label" style="font-weight: bold"
          >Full Name
        </label>
        <input
          name="username"
          type="text"
          class="form-control"
          id="fullname"
          aria-describedby="text"
        />
      </div>
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
      </div>

      <input
        name="signup"
        type="submit"
        class="btn btn-primary"
        style="width: 410px; font-weight: bold"
        value="Sign Up"
      />

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
                Already On Beta?
              </p>
              <a
                class="link-opacity-100"
                href="../LogIn/Login.php"
                style="font-size: small; margin-left: 4px"
                >Log In</a
              >
            </div>
          </div>
        </div>
      </div>
    </form>

    <script src="../JS/bootstrap.min.js"></script>
  </body>
</html>

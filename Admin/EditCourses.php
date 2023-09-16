

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
      <h1 style="margin-right: 50px">Edit Your Courses!</h1>
    </div>

    <?php
    include '../Components/NormalNavbar.php';

    
     $course_id=$_GET["cid"];
     $flag = $_GET['flag'];

     if(isset($_POST["Csubmit1"])){

      $Cname= $_POST["Cname"];
      $Cdetails= $_POST["Cdetails"];
      $Clevel= $_POST["Clevel"];
      $Cduration= $_POST["Cduration"];
      $Cprice= $_POST["Cprice"];
      $Cinstructor= $_POST["Cinstructor"];
      $Ccertificate= $_POST["Ccertificate"];
      $Coutput= $_POST["Coutput"];
      $image1= $_FILES["image1"]["name"];
      $image1tmp= $_FILES["image1"]["tmp_name"];
      $image2= $_FILES["image2"]["name"];
      $image2tmp= $_FILES["image2"]["tmp_name"];
      $folder1="../CardImages/".$image1;
      $folder2="../IconImages/".$image2;

      $sql1="UPDATE courses SET c_name='$Cname', c_details='$Cdetails', c_level='$Clevel', c_duration='$Cduration', c_price='$Cprice', c_certification='$Ccertificate', c_learn='$Coutput', c_image1='$image1', c_image2='$image2' WHERE c_id='$course_id'  ";
      
      if($conn->query($sql1) === TRUE){
        echo"<div class='alert alert-success' role='alert' style='text-align: center; line-height: 2; font-weight: bold;'>
        Your Workshop Has Been Edited And Saved Successfully!
      </div> ";
        move_uploaded_file($image1tmp, $folder1);
        move_uploaded_file($image2tmp, $folder2);
       } else{
        echo"Error: $sql <br> $conn->error ";
       }
     }

     if(isset($_POST["Csubmit2"])){

      $Cname= $_POST["Cname"];
      $Cdetails= $_POST["Cdetails"];
      $Clevel= $_POST["Clevel"];
      $Cduration= $_POST["Cduration"];
      $Cprice= $_POST["Cprice"];
      $Cinstructor= $_POST["Cinstructor"];
      $Ccertificate= $_POST["Ccertificate"];
      $Coutput= $_POST["Coutput"];
      $image1= $_FILES["image1"]["name"];
      $image1tmp= $_FILES["image1"]["tmp_name"];
      $image2= $_FILES["image2"]["name"];
      $image2tmp= $_FILES["image2"]["tmp_name"];
      $folder1="../CardImages/".$image1;
      $folder2="../IconImages/".$image2;

      $sql2="UPDATE diplomas SET c_name='$Cname', c_details='$Cdetails', c_level='$Clevel', c_duration='$Cduration', c_price='$Cprice', c_certification='$Ccertificate', c_learn='$Coutput', c_image1='$image1', c_image2='$image2' WHERE c_id='$course_id'  ";

      if($conn->query($sql2) === TRUE){
        echo"<div class='alert alert-success' role='alert' style='text-align: center; line-height: 2; font-weight: bold;'>
        Your Diploma Has Been Eidted And Saved Successfully!
      </div> ";
        move_uploaded_file($image1tmp, $folder1);
        move_uploaded_file($image2tmp, $folder2);
       } else{
        echo"Error: $sql <br> $conn->error ";
       }
     }

     if($flag=='workshop'){

        $sql="SELECT * FROM courses Where c_id=$course_id";
        $result=$conn->query($sql);
        $row= $result->fetch_assoc();
 
      } else if($flag=='diploma'){
 
         $sql="SELECT * FROM diplomas Where c_id=$course_id";
         $result=$conn->query($sql);
         $row= $result->fetch_assoc();
 
      }
    ?>

    <form style="margin: 20px" method="post" action="" enctype="multipart/form-data">
      <div class="container-fluid" style="margin: 5px">
        <div class="row" style="margin: 5px">
          <div class="col-md-6">
          <input type="hidden" name="action" id="action" value="">
            <label for="text" class="form-label" style="font-weight: bold; "
              >Course Name
            </label>
            <input
            placeholder="Course name"
            name="Cname"
              type="text"
              class="form-control"
              id="fullname"
              aria-describedby="text"
              value="<?php echo $row["c_name"]; ?>"
            />
          </div>

          <div class="col-md-6">
          <label for="text" class="form-label" style="font-weight: bold"
              >Course Level
            </label>
            <input
            placeholder="Course level"
            name="Clevel"
              type="text"
              class="form-control"
              id="fullname"
              aria-describedby="text"
              value="<?php echo $row["c_level"]; ?>"
            />
          </div>
        </div>

        <div class="row" style="margin: 5px">
          <div class="col-md-6">
          <label for="text" class="form-label" style="font-weight: bold"
              >Course Price
            </label>
            <input
            placeholder="Course price"
            name="Cprice"
              type="text"
              class="form-control"
              id="fullname"
              aria-describedby="text"
              value="<?php echo $row["c_price"]; ?>"
            />
          </div>

          <div class="col-md-6">
            <label for="text" class="form-label" style="font-weight: bold"
              >Course Duration
            </label>
            <input
            placeholder="Course duration"
            name="Cduration"
              type="text"
              class="form-control"
              id="fullname"
              aria-describedby="text"
              value="<?php echo $row["c_duration"]; ?>"
            />
          </div>
        </div>

        <div class="row" style="margin: 5px">
          <div class="col-md-6">
          <label for="text" class="form-label" style="font-weight: bold"
              >Course Certificate
            </label>
            <input
            placeholder="Certificate option"
            name="Ccertificate"
              type="text"
              class="form-control"
              id="fullname"
              aria-describedby="text"
              value="<?php echo $row["c_certification"]; ?>"
            />
          </div>

          <div class="col-md-6">
            <label for="text" class="form-label" style="font-weight: bold"
            >Course Instructor
          </label>
            <select class="form-select" aria-label="Course Instructor" name="Cinstructor">
                <option selected>Select Instructor</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                <option value="4">Four</option>
                <option value="5">Five</option>
                <option value="6">Six</option>
                <option value="7">Seven</option>
                <option value="8">Eight</option>
              </select>
          </div>
        </div>

        <div class="row" style="margin: 5px">
          <div class="col-md-12">
            <label for="text" class="form-label" style="font-weight: bold"
              >Course Output
            </label>
            <input
            placeholder="Course output"
            name="Coutput"
              type="text"
              class="form-control"
              id="fullname"
              aria-describedby="text"
              value="<?php echo $row["c_learn"]; ?>"
            />
          </div>
        </div>

        <div class="row" style="margin: 5px">
          <div class="col-md-12">
           <label for="text" class="form-label" style="font-weight: bold"
              >Course Details
          </label>
          <div class="form-floating" >
            <textarea class="form-control"  id="floatingTextarea2" style="height: 100px;" name="Cdetails" >
            <?php echo $row["c_details"]; ?>
            </textarea>
           </div>
          </div>
        </div>

        <div class="row" style="margin: 5px">
          <div class="col-md-12">
          <div class="mb-3">
            <label for="formFile" class="form-label" style="font-weight: bold">Choose Card Image</label>
            <input class="form-control" type="file" id="formFile1" name="image1" />
          </div>
          </div>
        </div>

        <div class="row" style="margin: 5px">
          <div class="col-md-12">
          <div class="mb-3">
            <label for="formFile" class="form-label" style="font-weight: bold"
              >Choose Cours Details Image</label
            >
            <input class="form-control " type="file" id="formFile2" name="image2" />
          </div>
          </div>
        </div>

        <div style="margin: 10px;">
            <input
                type="submit"
                class="btn btn-primary btn-block"
                style="font-weight: bold; width: 100%; "
                name="Csubmit1"
                value=" Update This Workshop"
            >
        </div>

        <div style="margin: 10px;">
            <input
                type="submit"
                class="btn btn-primary btn-block"
                style="font-weight: bold; width: 100%; "
                name="Csubmit2"
                value="Update This Diploma"
            >
         </div>
       </div>
      </div>
    </form>
    
    <?php
       include '../Components/Footer.php';
    ?>
    <div style="height: 70px"></div>
    <script src="../JS/bootstrap.min.js"></script>
  </body>
</html>

<?php

include '../Components/db.php';
$course_id = $_GET["cid"];
$flag = $_GET['flag'];

if ($flag == 'workshop') {
  $sql1 = "DELETE FROM courses WHERE c_id=$course_id";

  if ($conn->query($sql1) === TRUE) {
    echo '
    <div class="alert alert-success" role="alert">
      Your Workshop Has Been Deleted Successfully!
    </div>';
    header('location: Admin/Dashboard.php');
    exit;
  } else {
    echo 'Error: ' . $sql1 . '<br />' . $conn->error;
  }
} elseif ($flag == 'diploma') {
  $sql2 = "DELETE FROM diplomas WHERE c_id=$course_id";

  if ($conn->query($sql2) === TRUE) {
    echo '
    <div class="alert alert-success" role="alert">
      Your Diploma Has Been Deleted Successfully!
    </div>';
    header("location: ../Admin/Dashboard.php");
    exit;
  } else {
    echo 'Error: ' . $sql2 . '<br />' . $conn->error;
  }
}

?>

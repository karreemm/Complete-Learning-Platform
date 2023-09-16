<?php

include '../Components/db.php';
$aid = $_GET["aid"];

$sql1 = "DELETE FROM admins WHERE id=$aid";
if ($conn->query($sql1) === true) {
    header('location: ../Admin/Dashboard.php');
} else {
    echo "Error: $sql <br />" . $conn->error;
}
 ?>
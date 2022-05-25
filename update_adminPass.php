<?php 
include('config.php');
include("process_input.php");
$id = $_SESSION['adminID'];
$newPass = processInput($_POST['newPass']);

$result = mysqli_query($conn, "UPDATE `admin` SET `pwd`='$newPass' WHERE id='$id'");

header('location:admin_portal.php');
?>

<?php 
include('config.php');
include("process_input.php");
$fname = processInput($_POST['fname']);
$lname = processInput($_POST['lname']);
$email = processInput($_POST['email']);
$phone = processInput($_POST['phone']);
$course = processInput($_POST['course']);
$password = processInput($_POST['password']);
$id = $_POST['id'];
$sql = mysqli_query($conn, "UPDATE `user` SET `fname`='$fname', `lname`='$lname', `email`='$email', `phone`='$phone', `course`='$course', `password`='$password' WHERE email='$id'");
if(isset($_SESSION['admin']))
{
  header('location:admin_portal.php');
}
else
{
  header('location:student_portal.php');
}
?>
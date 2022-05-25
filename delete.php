<?php 
include('config.php');
$sql = mysqli_query($conn, "DELETE FROM ".$_POST['del_table']." WHERE ".$_POST['del_pk']." = '".$_POST['del_id']."'");
if($_POST['del_table'] = 'user' && !isset($_SESSION['admin']))
{
	header('location:logout.php');
}
else
{
	header('location:admin_portal.php');
}
?>
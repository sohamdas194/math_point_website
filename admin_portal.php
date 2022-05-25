<?php
include("config.php");
if (!isset($_SESSION['admin'])) {
	header('location:admin.php');
}

$result = pg_query($conn, "SELECT pwd FROM admin Where id=".$_SESSION['adminID']);
$row = pg_fetch_array($result);
$admin_pwd = $row['pwd'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Admin Portal</title>
	<!-- Stylesheet -->
    <link href="css/portal.css" rel="stylesheet">
</head>

<body>
	<ul class="sticky">
		<li><a style="background-color: #111; cursor: text;">Welcome Admin</a></li>
		<?php echo '<li><a onclick="openPassForm(\''.$admin_pwd.'\')">Change Password</a></li>'; ?>
		<!-- <li><a onclick="openPassForm()">Change Password</a></li> -->
		<li style="float:right"><a class="active" href="logout.php">Logout</a></li>
		<li style="float:right"><a href="admin_portal.php">Refresh</a></li>
	</ul>

	<br>

	<table>
		<thead>
			<center><h3>Contact Requests</h3></center>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Message</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$result = pg_query($conn, "SELECT * FROM contact");
			while ($r = pg_fetch_array($result)) {
			?>
				<tr>
					<td><?php echo $r['name']; ?></td>
					<td><?php echo $r['email']; ?></td>
					<td><?php echo $r['message']; ?></td>
					<td style="width: 6%;">
						<form action="delete.php" method="POST" style="float: right;">
							<input type="hidden" name="del_table" value="contact"/>
							<input type="hidden" name="del_pk" value="id"/>
							<button type="submit" class="btn btn-danger" name="del_id" value="<?php echo $r['id']; ?>">Delete</button>
						</form>
					</td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>

	<table>
		<thead>
			<center><h3>FeedBacks</h3></center>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Phone number</th>
				<th>Comment</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$result = pg_query($conn, "SELECT * FROM feedback");
			while ($r = pg_fetch_array($result)) {
			?>
				<tr>
					<td><?php echo $r['fname'] . " " . $r['lname']; ?></td>
					<td><?php echo $r['email']; ?></td>
					<td><?php echo $r['phone']; ?></td>
					<td><?php echo $r['comment']; ?></td>
					<td style="width: 6%;">
						<form action="delete.php" method="POST" style="float: right;">
							<input type="hidden" name="del_table" value="feedback"/>
							<input type="hidden" name="del_pk" value="id"/>
							<button type="submit" class="btn btn-danger" name="del_id" value="<?php echo $r['id']; ?>">Delete</button>
						</form>
					</td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>

	<table>
		<thead>
			<center><h3>Users</h3></center>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Phone number</th>
				<th>Course</th>
				<th>Password</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$result = pg_query($conn, "SELECT * FROM \"user\"");
			while ($r = pg_fetch_array($result)) {
			?>
				<tr>
					<td><?php echo $r['fname'] . " " . $r['lname']; ?></td>
					<td><?php echo $r['email']; ?></td>
					<td><?php echo $r['phone']; ?></td>
					<td><?php echo $r['course']; ?></td>
					<td><?php echo $r['password']; ?></td>
					<td style="width: 13%;">
						<?php echo '<button type="button" onclick="openForm(\''.$r['fname'].'\',\''.$r['lname'].'\',\''.$r['email'].'\',\''.$r['phone'].'\',\''.$r['course'].'\',\''.$r['password'].'\')" class="btn btn-primary" id="btn-update">Edit</button>'; ?>
						<form action="delete.php" method="POST" style="float: right;">
							<input type="hidden" name="del_table" value="user"/>
							<input type="hidden" name="del_pk" value="email"/>
							<button type="submit" class="btn btn-danger" name="del_id" value="<?php echo $r['email']; ?>">Delete</button>
						</form>
					</td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>

	<div class="form-popup" id="myForm">
  		<form action="update_user.php" class="form-container" id="update_form" method="POST">
	  		<span class="close" onclick="closeForm()">&times;</span>
		    <h1>Edit</h1>

		    <label class="required" for="first_name">First Name</label>
		   	<input id="first_name" type="text" name="fname" maxlength="50" size="30" required>

		   	<label class="required" for="last_name">Last Name</label>
		   	<input id="last_name" type="text" name="lname" maxlength="50" size="30" required>

		   	<label class="required" for="email">Email Address</label>
		   	<input id="email" type="email" required name="email" maxlength="80" size="30">

		   	<label class="required" for="phone">Phone Number</label>
		   	<input id="phone" type="text" maxlength="10" size="30" required name="phone">

		    <label class="required" for="course">Course</label>
		    <select id="course" name="course" required>
		        <option value="" disabled hidden>Select Course</option>  
		        <option id='BBA' value="BBA">BBA</option>
		        <option id='BCA' value="BCA">BCA</option>
		        <option id='MBA' value="MBA">MBA</option>
		        <option id='MCA' value="MCA">MCA</option>
		    </select>

		   	<label class="required" for="password">Password</label>
		   	<input id="password" type="text" name="password">

		    <button type="submit" class="btn btn-primary">Update</button>
  		</form>
	</div>

	<div class="form-popup" id="myPassForm">
  		<form action="update_adminPass.php" class="form-container" id="update_adminPass" method="POST">
	  		<span class="close" onclick="closePassForm()">&times;</span>
		    <h1>Change Password</h1>
		    
		    <label for="oldPass">Old Password</label>
		    <div class="formTxt" id="oldPass">

		    </div>

		   	<label class="required" for="newPass">New Password</label>
		   	<input id="newPass" type="text" name="newPass" required placeholder="Enter New Password">

		    <button type="submit" class="btn btn-primary">Change</button>
  		</form>
	</div>

	<script src="js/portal.js"></script>

</body>
</html>

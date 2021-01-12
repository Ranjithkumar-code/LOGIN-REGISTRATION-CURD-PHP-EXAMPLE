<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Data Edit/Delete</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<link rel=”stylesheet” href=”bootstrap-4.0.0-dist/css/bootstrap.min.css”>
<link rel=”stylesheet” href=”bootstrap-4.0.0-dist/js/bootstrap.min.js”>
</head>
<body>
	<?php require_once "action.php"; ?>
	<form action="loginact.php">
		<div class="topnav">
		<a href="about.php">About</a>
		<a class="active" href="#table">Edit/Delete</a>
		<a href="home.php">Add</a>
		<div class="form-btn">
				<button type="submit" name="logout" class="btn btn-danger">Logout</button>
		</div>
	</div>
	</form>
	<?php if(isset($_SESSION['message'])):?>
		<div class="alert alert-<?=$_SESSION['msg_type'];?>">
			<?php echo $_SESSION['message'];
				unset($_SESSION['message']);?>
		</div>
		<?php endif; ?>
	<div class="container">
	<form action="action.php" method="post">
		<div class="form-group1">
		<?php $db = new mysqli('localhost','root','','testdb') or die(mysql_error($db)) ;?>
		<?php $result = mysqli_query($db,"SELECT * FROM curdtb") or die(mysql_error($db));?>
		<center>
			<table class="table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Location</th>
					<th>Email</th>
					<th>MobileNumber</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<?php while($row = $result->fetch_assoc()): ?>
				<tr>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['location'];?></td>
					<td><?php echo $row['email'];?></td>
					<td><?php echo $row['mob_num'];?></td>
					<td>
						<a href="home.php?edit=<?php echo $row['id'];?>" class="btn btn-info">edit</a>
						<a href="home.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">delete</a>
					</td>
				</tr>
			<?php endwhile;?>
		</table>
		</center>
	</div>
	</form>
</div>
</body>
</html>
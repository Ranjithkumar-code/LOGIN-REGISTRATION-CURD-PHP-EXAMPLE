<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Home Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<link rel=”stylesheet” href=”bootstrap-4.0.0-dist/css/bootstrap.min.css”>
<link rel=”stylesheet” href=”bootstrap-4.0.0-dist/js/bootstrap.min.js”>
</head>
<body class="ht">
	<form action="loginact.php">
	<div class="topnav">
		<a href="about.php">About</a>
		<a href="table.php">Edit/Delete</a>
		<a class="active" href="#home">Add</a>
		<div class="form-btn">
				<button type="submit" name="logout" class="btn btn-danger">Logout</button>
		</div>
	</div>
	</form>
	<?php require_once "action.php"; ?>
		<?php if(isset($_SESSION['message'])):?>
		<div class="alert alert-<?=$_SESSION['msg_type'];?>">
			<?php echo $_SESSION['message'];
				unset($_SESSION['message']);?>
		</div>
		<?php endif;?>
		<center><h3>WELLCOME</h3>
			<p>This is my first php project.</p>
		</center>
	<div class="body">
		<form action="action.php" method="post">
			<center><div class="form-group">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<label>Name</label>
				<input type="text" name="name" class="form-control" value="<?php echo $name;?>" placeholder="Enter the Name">				
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" class="form-control" value="<?php echo $email;?>" placeholder="Enter the Email">				
			</div>
			<div class="form-group">
				<label>Location</label>
				<input type="text" name="location" class="form-control" value="<?php echo $location;?>" placeholder="Enter the location">				
			</div>
			<div class="form-group">
				<label>MobileNuber</label>
				<input type="text" name="mob_num" class="form-control" value="<?php echo $mob_num;?>" placeholder="Enter the Name">				
			</div>
			<?php if($update == true): ?>
			<div class="form-group">
				<button type="submit" name="update" class="btn btn-primary">update</button>
			</div>
			<?php else: ?>
			<div class="form-group">
				<button type="submit" name="save" class="btn btn-primary">save</button>
			</div>
			<?php endif; ?>
		</form>
	</div></center>
</body>
</html>
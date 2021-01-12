<!DOCTYPE html>
<html>
<head>
<style>
.bg{
  background-color: #6D7B8D;
}
.error{
  width: 10px;
  font-size: 15px;
  color: white;
  background: #5F9EA0;
  border: auto;
  border-radius: 5px;
}
.container{
  padding: 50px;
}
.header{
  width: 100%;
  margin: 0px auto 0px;
  color: white;
  background: #E41B17;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-radius: 10px 10px 0px 0px;
  padding: 10px;
}
.form-group{
  font-size: 18px;
  font-weight: bold;
}
</style>
<title>FirstApp</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</head>
<body class= "bg">
  <?php require_once "process.php"; ?>
  <?php if(isset($_SESSION['message'])):?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
      <?php
      echo $_SESSION['message'];
      unset($_SESSION['message']);?>
    </div>
  <?php endif; ?>
  <div class= "container" >
  <div class="row justify-content-center">
  <form  action="process.php" method="post">
    <?php include "errors.php"; ?>
    <div class="header">
      <h3>REGISTER HERE</h3>
    </div>
    <div class="form-group">
      <label>Name</label>
      <input type="text" name="username" class="form-control" value="<?php echo $username; ?>"  placeholder="Enter UserName">
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="text" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="password" name="password_1" class="form-control" placeholder="Enter Password">
    </div>
    <div class="form-group">
      <label>Confirm Password</label>
      <input type="password" name="password_2" class="form-control" placeholder="Enter Confirm Password">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-info" name="register">Register</button>
    </div>
    <p>
      Already member? <a href="index.php">Login </a>
    </p>
  </form>
</div>
</div>
</body>
</html>

<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'testdb') or die(mysqli_error($mysqli));

$username = "";
$email = "";
$password_1 = "";
$password_2 = "";
$errors = array();
if(isset($_POST['register'])){
  $username =mysqli_real_escape_string($mysqli, $_POST['username']);
  $email = mysqli_real_escape_string($mysqli, $_POST['email']);
  $password_1 = mysqli_real_escape_string($mysqli, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($mysqli, $_POST['password_2']);
  //chech valid or invalid data
  if(empty($username)){
    array_push($errors,"Please Enter UserName");
  }
  if(empty($email)){
    array_push($errors,"Please Enter Email");
  }
  if(empty($password_1)){
    array_push($errors,"Please Enter Password");
  }
  if($password_1 != $password_2){
    array_push($errors,"Two password do not match");
  }
  //data insert to the database
  if(count($errors)==0){
    $password = md5($password_1);
    $query = "INSERT INTO registration (username, password, email) VALUES ('$username', '$password', '$email')";
    mysqli_query($mysqli,$query);
    $_SESSION['message']= "RECORD SAVE SUCCESSFULLY!";
    $_SESSION['msg_type']= "success";
    header("location: index.php");
  }
  if(count($errors)>0){
    $_SESSION['message']= "Please Fill required field!";
    $_SESSION['msg_type']= "warning";
   header("location: register.php");
 }
}
?>

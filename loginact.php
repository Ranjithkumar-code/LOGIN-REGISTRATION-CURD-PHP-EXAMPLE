<?php
require_once "process.php";
//session_start();
$mysqli = new mysqli('localhost', 'root', '', 'testdb') or die(mysqli_error($mysqli));

$username = "";
$password = "";
$password_1 = "";
$errors = array();


if(isset($_POST['login'])){
  $username = mysqli_real_escape_string($mysqli, $_POST['username']);
  $password_1 = mysqli_real_escape_string($mysqli, $_POST['password']);

  if(empty($username)){
    array_push($errors,"Please Enter UserName");
  }
  if(empty($password_1)){
    array_push($errors,"Please Enter Password");
  }
  if(count($errors)==0){
  $password = md5($password_1); //md5("ranjith");
  $query = "SELECT * FROM registration WHERE username='$username' AND password='$password'";
  $result = mysqli_query($mysqli,$query);//or die(mysqli_error($mysqli));
  if(mysqli_num_rows($result)== 1){
    $_SESSION['message'] = "LOGIN SUCCESSFULLY!";
    $_SESSION['msg_type'] = "success";
    header("location: home.php");
    }else{
    $_SESSION['message'] = "Username and Password Wrong!";
    $_SESSION['msg_type'] = "danger";
    header("location: index.php");
    }
}
  else{
  $_SESSION['message'] = "Username and Password Wrong!";
  $_SESSION['msg_type'] = "danger";
  header("location: index.php");
  }
}//header("location: index.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location: index.php");
}
?>

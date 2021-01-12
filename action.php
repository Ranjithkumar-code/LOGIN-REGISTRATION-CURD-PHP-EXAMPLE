<?php  
session_start();
//mysql connection
$db = new mysqli('localhost','root','','testdb') or die(mysqli_error($db));

$id= 0;
$name= "";
$location= "";
$email= "";
$mob_num= "";
$update = false;
$errors = array();

if(isset($_POST['save'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$location = $_POST['location'];
	$mob_num = $_POST['mob_num'];
	if(empty($name)){
		array_push($errors,"please enter your name");
	}
	if(empty($email)){
		array_push($errors,"please enter your email");	
	}
	if(empty($location)){
		array_push($errors,"please enter your location");
	}
	if(empty($mob_num)){
		array_push($errors,"please enter your mobile number");
	}
	if(count($errors)==0){
		$query = "INSERT INTO curdtb(name,location,email,mob_num) VALUES('$name','$location','$email','$mob_num')";
			mysqli_query($db,$query) or die(mysqli_error($db));
			$_SESSION['message'] = "Record has been saved successfuly!";
			$_SESSION['msg_type'] = "success";
			header("location: home.php");
	}else{
		$_SESSION['message'] = "please fill required fields!";
			$_SESSION['msg_type'] = "danger";
			header("location: home.php");
	}
}
 if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($db,"DELETE FROM curdtb WHERE id=$id") or die($mysqli->error());
   $_SESSION['message']="Record has been Deleted!";
   $_SESSION['msg_type']="danger";
   header("location: table.php");
 }
 if(isset($_GET['edit'])){
   $id = $_GET['edit'];
   $update= true;
  $result = mysqli_query($db,"SELECT * FROM curdtb WHERE id= $id") or die($mysqli->error());
   if (mysqli_num_rows($result)==1){
    $row = $result->fetch_array();
     $name = $row['name'];
     $location = $row['location'];
     $email = $row['email'];
     $mob_num = $row['mob_num'];
   }
 }
 if(isset($_POST['update'])){
 	$id = $_POST['id'];
 	$name = $_POST['name'];
 	$location = $_POST['location'];
 	$email = $_POST['email'];
 	$mob_num = $_POST['mob_num'];
 	if((empty($id)&&$id!=0)||empty($name)||empty($location)||empty($email)||empty($mob_num)){
 		$_SESSION['message'] = "Please fill all the required fields!";
			$_SESSION['msg_type'] = "warning";
			header("location: home.php");
 	}
 	else{
 		mysqli_query($db,"UPDATE curdtb SET name='$name',location='$location',email='$email',mob_num='$mob_num' WHERE id=$id");
 		$_SESSION['message'] = "Record has been Updated successfuly!";
			$_SESSION['msg_type'] = "success";
			$update = false;
			header("location: home.php");
 	}
 }
?>

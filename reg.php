<?php
  include 'connect.php';
  $uname=$_POST['uname'];
  $pswd=$_POST['pswd'];
  $name=$_POST['name'];
  $age=$_POST['age'];
  $nation=$_POST['nation'];
  session_start();
  $_SESSION['name']=$name;
  $sql="INSERT INTO users (name,age,nationality,username,password)VALUES(\"$name\",$age,\"$nation\",\"$uname\",\"$pswd\")";
  if($conn->query($sql)===TRUE){
	$_SESSION['uname']=$uname;
	header("Location: home.php");
	exit();
  }
  else{
	header("Location: register.php?name={$name}&age={$age}&ntn={$nation}");
	exit();
  }
?>

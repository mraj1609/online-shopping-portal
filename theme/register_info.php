<?php
  include '../connect.php';
if($_SERVER["REQUEST_METHOD"]=="POST" && (isset($_POST['uname']))){
  $uname=$_POST['uname'];
  $pswd=$_POST['pswd'];
  $name=$_POST['name'];
  $age=$_POST['age'];
  $nation=$_POST['nation'];
  $photo=$_POST['photo'];
  $img="images/users/".$photo.".jpg";
  $sql="INSERT INTO users (name,age,nationality,username,password,photo)VALUES(\"$name\",$age,\"$nation\",\"$uname\",\"$pswd\",\"$img\")";
  if($conn->query($sql)===TRUE){
	echo "1";
  }
  else{
	echo "2";
  }
}
ob_end_flush();
?>


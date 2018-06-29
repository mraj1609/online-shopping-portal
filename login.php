<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" href="test1.css">
<h3>Enter your username and password</h3>
<form action ="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
 Username <input type="text" name="uname"><br>
 Password <input type="password" name="pswd"><br>
 <input type="submit" value= "login">
</form>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $uname=$_POST['uname'];
  $pswd=$_POST['pswd'];
  include 'connect.php';
  $sql="SELECT * FROM users WHERE username = \"$uname\" AND password = \"$pswd\"";
  $res=$conn->query($sql);
  if($res->num_rows > 0)
  {
	$row=$res->fetch_assoc();
	$_SESSION['uname']=$uname;	
	if($row['role']=="admin"){
		header("Location: back/admin.php");
		exit();
	}
	header("Location: home.php");
	exit();
  }
  else{
	?><script>alert("Wrong username or password!")</script><?php
  }
}
?>
<a href="welcome.php"><button>Back</button></a>
</body>
</html>

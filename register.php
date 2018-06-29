<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" href="test1.css">
<h3>Sign up</h3>
<?php 
if(isset($_GET['name'])){
	echo "invalid username";
}
?>
<form action = "reg.php" method="post">
Name
<input type="text" name="name" value = "<?php 
if(isset($_GET['name'])){
	echo $_GET['name'];
}
?>">
<br>
Age
<input type="number" name="age" value = "<?php 
if(isset($_GET['age'])){
	echo $_GET['age'];
}
?>"><br>
Nationality
<input type="text" name="nation" value = "<?php 
if(isset($_GET['ntn'])){
	echo $_GET['ntn'];
}
?>"><br>
Username
<input type="text" name="uname"><br>
Password
<input type="password" name="pswd"><br>
<input type="submit" value="Sign up">
</form>
 <?php 
if(isset($_SESSION['name'])){
	$new=$_SESSION['name']; 
	echo $_new; 
}
?>
<a href="welcome.php"><button>Back</button></a>
</body>
</html>

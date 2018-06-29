<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" href="test2.css">
<h3>Users</h3>
<?php
include '../connect.php';
if(isset($_GET['uname'])){
	$uname = $_GET['uname'];
	$sql = "DELETE FROM users WHERE username=\"{$uname}\"";
	if($conn->query($sql)===TRUE){}
	else
		echo "error".$name;
}
$sql="SELECT * FROM users";
$res = $conn->query($sql);

if($res->num_rows > 0){
	echo "<table border=1><tr><th>Name</th><th>Age</th><th>Username</th><th>Role</th><th>Delete</th><th>Update Role</th></tr>";
        while($row = $res->fetch_assoc()){
                echo "<tr><td>".$row["name"]."</td><td>".$row["age"]."</td><td>".$row["username"]."</td><td>".$row["role"]."</td><td><a href=\"update_user.php?uname={$row['username']}\">Delete</a></td><td align=\"center\"><a href=\"role.php?uname={$row['username']}\">Update</a></td></tr>"; 	
	}
	echo "</table>";
}

echo "<br><a href= 'admin.php'><button>Home</button></a>";
?>
</body>
</html>

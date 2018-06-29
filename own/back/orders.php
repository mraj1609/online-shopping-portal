<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" href="test2.css">
<h3>Orders</h3>
<?php
include '../connect.php';
/*if(isset($_GET['uname'])){
	$uname = $_GET['uname'];
	$sql = "DELETE FROM users WHERE username=\"{$uname}\"";
	if($conn->query($sql)===TRUE){}
	else
		echo "error".$name;
}*/
$sql="SELECT o.id, i.title, i.company, o.username, o.time,o.status FROM orders o, items i where i.id=o.item_id order by time desc";
$res = $conn->query($sql);

if($res->num_rows > 0){
	echo "<table border=1><tr><th>Order Id</th><th>Title</th><th>Company</th><th>Username</th><th>Time</th><th>Status</th><th>Update Status</th></tr>";
        while($row = $res->fetch_assoc()){
                echo "<tr><td>".$row["id"]."</td><td>".$row["title"]."</td><td>".$row["company"]."</td><td>".$row["username"]."</td><td>".$row["time"]."</td><td>".$row["status"]."</td><td align=\"center\"><a href=\"status.php?id={$row['id']}\">Update</a></td></tr>"; 	
	}
	echo "</table>";
}
echo "<br><a href= 'admin.php'><button>Home</button></a>";
?>

</body>
</html>

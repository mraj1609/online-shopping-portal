<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" href="test1.css">
<h3>Orders</h3>
<?php
include 'connect.php';
/*if(isset($_GET['uname'])){
	$uname = $_GET['uname'];
	$sql = "DELETE FROM users WHERE username=\"{$uname}\"";
	if($conn->query($sql)===TRUE){}
	else
		echo "error".$name;
}*/
$sql="SELECT  i.title, i.company, o.time,o.status FROM orders o, items i where i.id=o.item_id and o.username = \"{$_SESSION['uname']}\" order by o.status asc";
$res = $conn->query($sql);

if($res->num_rows > 0){
	echo "<table border=1><tr><th>Title</th><th>Company</th><th>Time</th><th>Status</th></tr>";
        while($row = $res->fetch_assoc()){
                echo "<tr><td>".$row["title"]."</td><td>".$row["company"]."</td><td>".$row["time"]."</td><td style=\"background-color:lightgreen\">".$row["status"]."</td></tr>"; 	
	}
	echo "</table>";
}
echo "<br><a href= 'home.php'><button>Home</button></a>";
?>
</body>
</html>

<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" href="test1.css">
<?php
include 'connect.php';
$uname=$_SESSION['uname'];
$sql="SELECT * FROM cart WHERE username=\"$uname\"";
$stmt=$conn->prepare("insert into orders (item_id, username, quantity) values (?,?,?)");
$stmt->bind_param("isi",$item_id,$username,$quantity);
$res=$conn->query($sql);
if($res->num_rows > 0){
	while($row = $res->fetch_assoc()){
		$sql1="SELECT * FROM items WHERE id = {$row["item_id"]}";
		$res1=$conn->query($sql1);
		$row1=$res1->fetch_assoc();
		if($row1['quantity']<$row["qty"]){
			header("Location: cart.php?excess");
			exit();
		}
		$item_id = $row["item_id"];
		$username=$uname;
		$quantity=$row["qty"];
		$stmt->execute();
	}
}
$stmt->close();
$sql3="DELETE FROM cart";
if($conn->query($sql3)!==TRUE)
	echo "error in deleting cart";
?>
<p>Your order was placed succesfully<br> Ckeck your order status for approval</p>
<br><a href=home.php><button>Home</button></a>
<a href=orders.php><button>Orders</button>
<br><a href=welcome.php><button>Log out</button></a>
</body>
</html>

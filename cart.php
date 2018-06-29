<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="test1.css">
<style>
th{text-align: left;}
</style>
</head>
<body>
<h3>Your cart</h3>

<?php
if(isset($_GET['excess']))
	echo "The quantity in your cart is in excess to that in store <br>";
include 'connect.php';
$uname= $_SESSION['uname'];
$sql1="SELECT id,item_id,qty FROM cart WHERE username = \"$uname\"";
$res=$conn->query($sql1);
$sum=0; $i=1;
if($res->num_rows > 0){
	echo "<form action=\"delete_multiple.php\" method=\"post\">";
	echo "<table style=\"width:50%\"> <tr><th>select</th> <th>Title</th> <th>Quantity</th> <th>Price</th><th>Modify</th><th>Delete</th></tr>";
	while($rows=$res->fetch_assoc()){
		$sql2="SELECT title,price FROM items WHERE id={$rows["item_id"]}";
		$res1=$conn->query($sql2);
		if($res1->num_rows!=1)
			echo "error";
		$row=$res1->fetch_assoc();
		echo "<tr><td><input type=\"checkbox\" name=\"check_list[]\" value={$rows['id']}></td><td>".$row["title"]."</td><td>".$rows["qty"]."</td><td>".$rows["qty"]*$row["price"]."</td><td><a href=\"update_cart.php?id={$rows['id']}\">Update</a></td><td><a href=\"delete_item.php?id={$rows['id']}\">Delete</a></td></tr>";
		$sum+=$rows["qty"]*$row["price"];
	}
	echo "</table><p><input type=\"submit\" value=\"delete selected\"></p> </form>";
	echo "<br><b>Your total payment is </b>".$sum."";
}
else
	echo "your cart is empty";
?>
<br><a href="home.php"><button>Shop More!</button></a>
<a href="checkout.php"><button>Checkout</button><a>
<a href="orders.php"><button>Orders</button></a>
</body>
</html>

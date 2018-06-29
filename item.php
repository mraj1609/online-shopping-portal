<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" href="test1.css">

<a href="item.php?cat=electronics"><button>ELECTRONICS</button></a>
<a href="item.php?cat=clothing"><button>CLOTHING</button></a>
<a href="item.php?cat=furniture"><button>FURNITURE</button></a>
<a href="item.php?cat=grocery"><button>GROCERY</button></a>
<a href="orders.php"><button>Orders</button></a>
<br>
<h3>List of Items</h3>
<?php
/*if($_SESSION['cart']){
	echo "<h3 style=\"color:red;\">your item was added sucessfully</h5>";
	$_SESSION['cart']=0;
}*/
include 'connect.php';
$cat=$_GET['cat'];
$sql="SELECT id,title, company, price FROM items WHERE category=\"$cat\"";
$res=$conn->query($sql);
if($res->num_rows > 0){
	$i=1;
	while($row=$res->fetch_assoc()){
		echo "<br>".$i.".<b> Title: </b>".$row["title"]."\t <b> Company: </b>".$row["company"]."\t <b>Price: </b>".$row["price"];
		echo "<form action=\"insert.php\" method=\"post\">
			<input type=\"number\" name= \"qty\">
		       <input type = \"hidden\" name=\"id\" value ={$row["id"]}>
			<input type = \"submit\" value = \"Add to cart\">
			</form>";
		$i++;
	}
}
else
	echo "no iems available for ".$cat ;
?>
<br><a href="welcome.php"><button>Log out</button></a>
<a href="cart.php"><button>Go to cart</button></a>
</body>
</html> 

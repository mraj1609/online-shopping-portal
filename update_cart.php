<!DOCTYPE html>
<html>
<link rel="stylesheet" href="test1.css">
<body>

<?php
include 'connect.php';
$id = $_GET['id'];
$sql="SELECT * FROM cart WHERE id = '$id'";
$res = $conn->query($sql);
if($res->num_rows > 0){
	$row= $res->fetch_assoc();
	$qty = $row["qty"];
	$iid=$row["item_id"];
}
$sql1 = "DELETE FROM cart WHERE id='$id'";
if($conn->query($sql1)===TRUE){
}
else
echo "error".$name;
?>
<h2>Current Entry</h2>
<p> Add the updated quantity of the item</p>
<form action="insert.php" method ="POST">
  <input type="hidden" name="id" value ="<?php echo $iid ?>">
  <input type="number" name="qty" value ="<?php echo $qty ?>">
  <br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>

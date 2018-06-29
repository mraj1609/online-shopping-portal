<!DOCTYPE hitml>
<html>
<link rel="stylesheet" href="test2.css">
<body>

<?php
include '../connect.php';
if(isset($_GET['id'])){
$id = $_GET['id'];
$sql="SELECT * FROM items WHERE id = '$id'";
$res = $conn->query($sql);
if($res->num_rows > 0){
	$row= $res->fetch_assoc();
	$qty = $row["quantity"];
	$category=$row['category'];
	$company=$row['company'];
	$price=$row['price'];
	$title=$row['title'];
}
$sql1 = "DELETE FROM items WHERE id='$id'";
if($conn->query($sql1)===TRUE){
}
else
echo "error".$name;
}
?>

<p> Fill the required fields of the item</p>
<form action="insert.php" method ="POST"> 
 category: <input type="text" name="category" value ="<?php echo $category ?>"><br>
 title:   <input type="text" name="title" value ="<?php echo $title ?>"><br>
 company:   <input type="text" name="company" value ="<?php echo $company ?>"><br>
 price: <input type="number" name="price" value ="<?php echo $price ?>"><br>
 quantity: <input type="number" name="qty" value ="<?php echo $qty ?>"><br>
  <br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>


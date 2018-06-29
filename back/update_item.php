<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<script src='../jquery-3.3.1.js'></script>
<script>

try{
function myscript(){
	if(document.getElementById('add').style.display=='block')
		document.getElementById('add').style.display='none';
	else
		document.getElementById('add').style.display='block';	

}

function submitScript(){
	var ajax=new XMLHttpRequest();
	ajax.onreadystatechange= function(){
	if(this.readyState==4 && this.status==200)
		if(this.responseText=="true")
			document.getElementById('result').innerHTML="your entry was added succesfully";
		else
			document.getElementById('result').innerHTML="your entry was not added succesfully";	
	}; 
	ajax.open('GET','insert.php?'+$('#add').serialize(),true);
	ajax.send();
}
}
catch(err)
{ document.getElementById('err').innerHTML=err.message;}
</script>
</head>
<body>
<link rel="stylesheet" href="test2.css">
<h3>Items</h3>
<?php
include '../connect.php';
if(isset($_GET['id'])){
	$sql1="delete from items where id={$_GET['id']}";
	if($conn->query($sql1)!==TRUE){
		die("error in deleting item");	
	}
}

$sql="SELECT * FROM items";
$res = $conn->query($sql);

if($res->num_rows > 0){
	echo "<table border=1><tr><th>Category</th><th>Title</th><th>Company</th><th>Price</th><th>Quantity</th><th>Delete</th><th>Modify</th></tr>";
        while($row = $res->fetch_assoc()){
                echo "<tr><td>".$row["category"]."</td><td>".$row["title"]."</td><td>".$row["company"]."</td><td>".$row["price"]."</td><td>".$row['quantity']."</td><td><a href=\"update_item.php?id={$row['id']}\">Delete</a></td><td><a href=\"modify.php?id={$row['id']}\">Update</a></td></tr>"; 	
	}
	echo "</table>";
}

echo "<br><a href= 'admin.php'><button>Home</button></a>";
echo "<a id='modify' onclick='myscript()' ><button>Add</button></a>";
?>
<form id='add' style='display:none;'  > 
 category: <input type="text" name="category" value ="<?php echo $category ?>"><br>
 title:   <input type="text" name="title" value ="<?php echo $title ?>"><br>
 company:   <input type="text" name="company" value ="<?php echo $company ?>"><br>
 price: <input type="number" name="price" value ="<?php echo $price ?>"><br>
 quantity: <input type="number" name="qty" value ="<?php echo $qty ?>"><br>
  <br>
  <input type="button" value="Submit" onclick='submitScript()'>
</form> 
<p style='color:red;' id='result'></p>
<p id='err'></p> 
</body>



</html>

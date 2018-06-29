<?php
session_start();
$uname=$_SESSION['uname'];
include '../connect.php';
$sql="select i.title,i.price,i.company,c.id,c.qty from items i,cart c where i.id=c.item_id and c.username='$uname'";
$res = $conn->query($sql);
$sum=0;$num=0;	
if($res->num_rows > 0){
	while($row=$res->fetch_assoc()){
		$id=$row['id'];
		if(isset($_GET[$id])){
			$qty=$_GET[$id];
			$sql1="update cart set qty= $qty where id= $id";
			if($conn->query($sql1)!==TRUE)
				die("error in updation");
			else{
				echo $row['id']."#".$qty*$row['price']."#";
				$sum+= $qty*$row['price'];	
				$num++;			
			}
		}	
	}
}
$total=$sum+($num*10);
echo "sum#".$sum."#".$total."#";
echo "Cart updated";
?>

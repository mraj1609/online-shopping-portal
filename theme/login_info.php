    <?php
	session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $uname=$_POST['uname'];
  $pswd=$_POST['pswd'];
  include '../connect.php';
  $sql="SELECT * FROM users WHERE username = \"$uname\" AND password = \"$pswd\"";
  $res=$conn->query($sql);
  if($res->num_rows > 0)
  {
	$row=$res->fetch_assoc();
	$_SESSION['uname']=$uname;
	$_SESSION['logged']=1;	
	if($row['role']=="admin"){
		echo "1";
	}
	else{		
		echo "3";
	}
  }
  else{
	echo "2";
  }
}
?>


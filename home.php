<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" href="test1.css">
<?php
$_SESSION['cart']=0;
echo "<h1> Hello ".$_SESSION['uname']."</h1>";
?>
<h3>Welcome to online shopping portal</h3>
<p>Please choose the category you want to buy from</p>

<a href="item.php?cat=electronics"><button>ELECTRONICS</button></a>
<a href="item.php?cat=clothing"><button>CLOTHING</button></a>
<a href="item.php?cat=furniture"><button>FURNITURE</button></a>
<a href="item.php?cat=grocery"><button>GROCERY</button></a>
<br>
<br>
<a href="orders.php"><button>Orders</button></a>
<a href="welcome.php"><button>Log out</button></a>
</body>
</html>

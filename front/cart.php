<?php  session_start();
if($_SESSION['logged']!=1){
header("Location: ../theme/login_page.php");
}
 
$uname=$_SESSION['uname'];
include '../connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
	Cart
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">



</head>

<body>
    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="index.php" data-animate-hover="bounce">
                    <img src="../theme/images/logo.png" style="position:relative; top:14px" alt="Company logo" class="hidden-xs">
                    <img src="../theme/images/logo.png" style="position:relative; top:14px" alt="Company logo" class="visible-xs">
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                   
                    <a class="btn btn-default navbar-toggle" href="cart.php">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">cart</span>
                    </a>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="index.php">Home</a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Category <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        
<?php
$sql = "select distinct(category) from items";
$res = $conn->query($sql);
if($res->num_rows > 0){
	while($row = $res->fetch_assoc()){
		echo "<div class='col-sm-3'><h5>".$row['category']."</h5> <ul>";
		$sql1="select distinct(title) from items where category='{$row['category']}'";
		$res1=$conn->query($sql1);
		if($res1->num_rows > 0){
			while($row1 = $res1->fetch_assoc()){
				echo "<li><a href= 'category.php?category=".$row['category']."&title=".$row1['title']."'>".$row1['title']."</a></li>";
			}	
		}
		echo "</ul></div>";
	} 	
}
if(isset($_GET['delete'])){
	$id=$_GET['id'];
	$sql="delete from cart where id=$id";
	if($conn->query($sql)!==TRUE)
		die("error in deletion");
}
else if(isset($_GET['id'])){
		$stmt= $conn->prepare("INSERT INTO cart (username,item_id,qty)VALUES (?,?,?)");
		$stmt->bind_param("sii",$uname,$id,$qty);

		$qty= 1;
		$id= $_GET['id'];
		$uname= $_SESSION['uname'];
	
		$stmt->execute();
		$stmt->close();
	}
$sql="select count(*) from cart where username='$uname'";
$res=$conn->query($sql);
$row=$res->fetch_assoc();
$num=$row['count(*)'];

$sql="select photo from users where username='$uname'";
$res=$conn->query($sql);
$row=$res->fetch_assoc();
$photo=$row['photo'];

?>	
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>

                    
                </ul>

            </div>
            <!--/.nav-collapse -->

            <div class="navbar-buttons">

                <div class="navbar-collapse collapse right" id="basket-overview">
                <a  href='profile.php'><img src='../theme/<?php echo $photo ;?>' style="float:right; position: relative ; top:15px; left: 23px; width:5% ; height:5% ; border-radius:50%;" alt='' ></a>
		    <a href="cart.php" style="float:right;" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm"><?php echo $num; ?> Items in Cart</span></a>
		
 			

                </div>
                <!--/.nav-collapse -->
	         

            </div>

            <div class="collapse clearfix" id="search">

               

            </div>
            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a>
                        </li>
                        <li>Shopping cart</li>
                    </ul>
                </div>

                <div class="col-md-9" id="basket">

                    <div class="box">

                        <form id="CartForm" action="javascript:cartChanger()">

                            <h1>Shopping cart</h1>
                            <p class="text-muted">You currently have <?php echo $num; ?> item(s) in your cart.</p>
				<p id='result' style="color:red;"></p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Company</th>
                                            <th>Unit Price</th>
                                            <th>Quantity</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php

$sql="select i.title,i.price,i.company,c.id,c.qty from items i,cart c where i.id=c.item_id and c.username='$uname'";
$res=$conn->query($sql);
$sum=0; $num=0;
if($res->num_rows > 0){
	while($row=$res->fetch_assoc()){
				$id=$row['id'];
				echo "  <tr>
                                            <td>
                                                ".$row['title']."
                                            </td>
                                            <td>".$row['company']."
                                            </td>
					    <td>
						&#8377; ".$row['price']."
					    </td>
                                            <td>
                                                <input type='number' value='".$row['qty']."' name='$id' class='form-control' min='1'> 
                                            </td>
                                            <td id='$id'>&#8377; ".$row['qty']*$row['price']."</td>
                                            <td><a href='cart.php?delete&id=".$row['id']."'><i class='fa fa-trash-o'></i></a>
                                            </td>
                                        </tr>";	
	$sum+=$row['qty']*$row['price'];
	$num++;
	}
}
?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th colspan="2" id='sum'>&#8377; <?php echo $sum; ?></th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="category.php" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                </div>
                                <div class="pull-right">
                                    <button type='submit' class="btn btn-default"><i class="fa fa-refresh"></i> Update basket</button>
                                    <a href="checkout.php" style="background-color:#4fbfa8;"class="btn btn-default"><i class="fa fa-chevron-right"></i>Proceed to checkout
                                    </a>
                                </div>
                            </div>

                        </form>

                    </div>
                    <!-- /.box -->


                    


                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order subtotal</td>
                                        <th id="subsum">&#8377; <?php echo $sum ;?></th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and handling</td>
                                        <th>&#8377; <?php echo $num*10;?></th>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <th>&#8377; 0.00</th>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <th id="total">&#8377;&nbsp;<?php echo $sum+($num * 10) ?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>


                    

                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

         <!-- *** FOOTER ***
 _________________________________________________________ -->
        <div id="footer" data-animate="fadeInUp">
            <div class="container">
                <div class="row">
			<div class="col-md-3 col-sm-6">

                        <h4>Account</h4>

                        <ul>
                            <li><a href="profile.php" >Profile</a>
                            </li>
                            <li><a href="../theme/login_page.php">Log out</a>
                            </li>
                        </ul>

		</div>
                    <div class="col-md-3 col-sm-6">
                        <h4>Get to know us</h4>

                        <ul>
                            <li><a href="contact.php">About us</a>
                            
                        </ul>

                       
                    </div>
                    <!-- /.col-md-3 -->
 		

                   
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Where to find us</h4>

                        <p><strong>Santiago Berbanau</strong>
                            <br>13/25 New Avenue
                            <br>Queens Road
                            <br>45Y 73J
                            <br>Madrid
                            <br>
                            <strong>Spain</strong>
                        </p>



                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->



                    <div class="col-md-3 col-sm-6">

                        <h4>Get the news</h4>

                        <p class="text-muted">Subscribe to our newsletter to get regular updates about our latest products and deals.</p>

                        <form>
                            <div class="input-group">



                                <span class="input-group-btn">

			    <button class="btn btn-default" type="button">Subscribe!</button>

			</span>

                            </div>
                            <!-- /input-group -->
                        </form>

                        <hr>

                        <h4>Stay in touch</h4>

                        <p class="social">
                            <a href="www.facebook.com" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                            <a href="www.twitter.com" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                            <a href="www.instagram.com" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>
                            <a href="www.google.com" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a>
                            <a href="www.gmail.com" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                        </p>


                    </div>
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->




        <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">© Raj Kumar Meena</p>

               
        </div>
        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->


    

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>
 <script>
function cartChanger(){
	var ajax=new XMLHttpRequest();
	ajax.onreadystatechange = function(){
		if(this.readyState==4 && this.status==200){
			var res=this.responseText.split("#");
			var i=0,str;
			while(res[i]!="sum"){
				str=res[i].toString();
				var z = parseInt(str);
				var k = z.toString();
				document.getElementById(k).innerHTML = "&#8377;&nbsp" + res[i+1];
				i+=2;
			}
			document.getElementById('sum').innerHTML = "&#8377; " + res[i+1];
			document.getElementById('subsum').innerHTML = "&#8377; " + res[i+1];
			document.getElementById('total').innerHTML = "&#8377;&nbsp" + res[i+2];
			document.getElementById('result').innerHTML = res[i+3];
		}
	};
	ajax.open("GET",'update_cart.php?'+$('#CartForm').serialize(),true);
	ajax.send();
}
</script>


</body>

</html>

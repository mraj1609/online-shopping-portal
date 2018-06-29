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
			Items	
		</title>

		<meta name="keywords" content="">

		<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

		<!-- styles -->
		<link href="css/font-awesome.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/animate.min.css" rel="stylesheet">
		<link href="css/owl.carousel.css" rel="stylesheet">
		<link href="css/owl.theme.css" rel="stylesheet">
		<link href="css/bootstrap-slider.min.css" rel="stylesheet">

		<!-- theme stylesheet -->
		<link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

		<!-- your stylesheet with modifications -->
		<link href="css/custom.css" rel="stylesheet">

		<script src="js/respond.min.js"></script>

		<link rel="shortcut icon" href="favicon.png">

		<style>
#slider12c .slider-selection {
	background : #5bc0de; 
}
		</style>

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
				$content=$res1;
				while($row1 = $res1->fetch_assoc()){
				echo "<li><a href= 'category.php?category=".$row['category']."&title=".$row1['title']."'>".$row1['title']."</a></li>";
				}	
				}
				echo "</ul></div>";
		} 	
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
							  </li>
						  </ul>
						  <!-- /.yamm-content -->
						  <li class="dropdown yamm-fw">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Search <b class="caret"></b></a>
							  <ul class="dropdown-menu">
								  <li>
									  <div class="yamm-content">

										  <div id='company' class= "col-sm-4"  ><b style="color:#3da892;">By Company</b><br>
											  <?php  
						     $cat="electronics";
						     $title="fridge";
						     if(isset($_GET['category'])){
						     $cat=$_GET['category'];
						     $title=$_GET['title'];
						     }

						     $sql1="select distinct(company) from items where category='$cat'";
						     $res1=$conn->query($sql1);
						     while($row=$res1->fetch_assoc()){
						     echo " <div class='checkbox'><label><input id ='".$row['company']."'  type = 'checkbox' value='' />".strtoupper($row['company'])."</label></div>";
						     }
						     ?>						
						     <button id="clear_com" class="btn btn-primary">Clear Selection</button>
										  </div> 
										  <div id="title" class= "col-sm-4"  ><b style="color:#3da892;">By Title</b><br>
											  <?php  

						   $sql1="select distinct(title) from items where category='$cat'";
						   $res1=$conn->query($sql1);
						   while($row=$res1->fetch_assoc()){
						   echo " <div class='checkbox'><label><input id ='".$row['title']."'  type = 'checkbox' value='' />".strtoupper($row['title'])."</label></div>";
						   }
						   ?>						
						   <button id="clear_tit" class="btn btn-primary">Clear Selection</button>
										  </div> 
										  <div class= "col-sm-4" ><b style="color:#3da892;">By Price</b><input id='ex12c' style="width:100%;" type="text"  />0<p id="lim" style="float:right;">50,000</p>
											  <div >
												  <input id="min" type="number" style="width:30%;" disabled="disabled"> <b style="position:relative;left:40px;">to</b>
												  <input id="max" type="number" style="width:30%; float:right;" disabled="disabled"> 
											  </div>
											  <div style="text-align:center; position:relative; left : -15px;" ><button  id="clear_pri" class="btn btn-primary">Reset</button></div>
										  </div>      
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


									  <!--/.nav-collapse -->

			  </div>
			  <!-- /.container -->
		  </div>
		  <!-- /#navbar -->

		  <!-- *** NAVBAR END *** -->
	  </div>

	  <div id="all">

		  <div id="content">
			  <div class="container">
				  <ul class="breadcrumb">
					  <li><a href="index.php">Home</a>
					  </li>
					  <li>Items</li>
					  <p id="test" style="float:right"></p>
				  </ul>
				  <div class="box">

					  <?php

	   ?>

	   <h1><?php echo strtoupper($cat) ;?></h1>
	   <p>In our <?php echo ucfirst($cat) ;?> department we offer wide selection of the best products we have found and carefully selected worldwide.</p>

				  </div>



				  <div class="col-md-12">



					  <div class="row products">

						  <?php 
	    $sql="select id,price,image,company,title from items where category='$cat' and title='$title' limit 10";
	    $res=$conn->query($sql);
	    if($res->num_rows > 0){
	    while($row=$res->fetch_assoc()){
	    echo " <div class='col-md-3 '>
		    <div class='product'>
			    <div class='text' style='text-align:center;'> 
				    <img src = '".$row['image']."'  alt='no img'> 
				    <h3 class='com' style='color:red;'>".strtoupper($row['company'])."</h3>
				    <h4 class='tit' >".strtoupper($row['title'])."</h4>
				    <p class='price'>&#8377;  <span class='money'>".$row['price']."</span></p>
				    <p class='buttons'>
				    <a href='cart.php?id=".$row['id']."' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add to cart</a>
				    </p>
			    </div>
			    <div class='ribbon new'>
				    <div class='theribbon'>NEW</div>

				    <div class='ribbon-background'></div>

			    </div>
			    <div class='ribbon sale'>
				    <div class='theribbon'>SALE</div>
				    <div class='ribbon-background'></div>
			    </div>
			    <!-- /.text -->
		    </div>
		    <!-- /.product -->
	    </div>";
	    }
	    }

	    $sql="select id,price,image,company,title from items where category='$cat' and title!='$title' limit 10";
	    $res=$conn->query($sql);
	    $i=1;
	    if($res->num_rows > 0){
	    while($row=$res->fetch_assoc()){
	    $i++;
	    echo " <div class='col-md-3'>
		    <div class='product'>
			    <div class='text' style='text-align:center;'> 
				    <img src = '".$row['image']."'  alt='no img'>  
				    <h3 class='com' style='color:red;'>".strtoupper($row['company'])."</h3>
				    <h4 class = 'tit' style='text-align:center;'>".strtoupper($row['title'])."</h4>
				    <p class='price'>&#8377; <span class='money'>".$row['price']."</span></p>
				    <p class='buttons'>
				    <a href='cart.php?id=".$row['id']."' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add to cart</a>
				    </p>
			    </div>";
			    if($i%3==0){
			    echo "";
			    }
			    echo "<!-- /.text -->
		    </div>
		    <!-- /.product -->
	    </div>";
	    }
	    }

	    ?>




					  </div>
					  <!-- /.products -->


				  </div>
				  <!-- /.col-md-12 -->

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
						    <li><a href="../theme/login_page.php">Log Out</a>
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
			</div>
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
	       <script src="js/bootstrap-slider.min.js"></script>
	       <script src="js/custom.js"></script>	

	</body>

</html>

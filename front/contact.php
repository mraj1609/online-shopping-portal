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
	Contact
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
	
<script>

		if(localStorage['contact'] !=1)
			window.location="error_page.php";
</script>
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

	 <a href="cart.php"  style="float:right;" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm"><?php echo $num; ?> Items in Cart</span></a>

                </div>
                <!--/.nav-collapse -->
	       

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
                        <li>Contact</li>
                    </ul>

                </div>

                <div class="col-md-3">
                     <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Customer section</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li >
                                    <a href="orders.php"><i class="fa fa-list"></i> My orders</a>
                                </li>
                                <li >
                                    <a href="profile.php"><i class="fa fa-user"></i> My account</a>
                                </li>
                                <li>
                                    <a href="../theme/login_page.php"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
				<li class="active">
                                    <a href="contact.php">Contact Admin</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->

                    
                </div>

                <div class="col-md-9">


                    <div class="box" id="contact">
                        <h1>Contact</h1>
			<p id="flag"></p>
                        <p class="lead">Are you curious about something? Do you have some kind of problem with our products?</p>
                        <p>Please feel free to contact us, our customer service center is working for you 24/7.</p>

                        <hr>

                        <div class="row">
                            <div class="col-sm-4">
                                <h3><i class="fa fa-map-marker"></i> Address</h3>
                                <p>Santiago Berbanau</strong>
                            	<br>13/25 New Avenue
                            	<br>Queens Road
                            	<br>45Y 73J
                            	<br>Madrid
                                    <br>
                                    <strong>Spain</strong>
                                </p>
                            </div>
                            <!-- /.col-sm-4 -->
                            <div class="col-sm-4">
                                <h3><i class="fa fa-phone"></i> Call center</h3>
                                <p class="text-muted">This number is toll free if calling from Spain otherwise we advise you to use the electronic form of communication.</p>
                                <p><strong>+33 555 444 333</strong>
                                </p>
                            </div>
                            <!-- /.col-sm-4 -->
                            <div class="col-sm-4">
                                <h3><i class="fa fa-envelope"></i> Electronic support</h3>
                                <p class="text-muted">Please feel free to write an email to us or to use our electronic ticketing system.</p>
                                <ul>
                                    <li><strong><a href="www.gmail.com">info@shopmail.com</a></strong>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.col-sm-4 -->
                        </div>
                        <!-- /.row -->
                    </div>


                </div>
                <!-- /.col-md-9 -->
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




    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>

    <script>
        function initialize() {
            var mapOptions = {
                zoom: 15,
                center: new google.maps.LatLng(49.1678136, 16.5671893),
                mapTypeId: google.maps.MapTypeId.ROAD,
                scrollwheel: false
            }
            var map = new google.maps.Map(document.getElementById('map'),
                mapOptions);

            var myLatLng = new google.maps.LatLng(49.1681989, 16.5650808);
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>


</body>

</html>

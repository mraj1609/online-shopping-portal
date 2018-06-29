<?php
session_start();
if($_SESSION['logged']!=1){
header("Location: login_page.php");
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Home</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet">
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader" style="display: none;">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header is_stuck" style="position: fixed; top: 0px; width: 1291px;">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="admin_home.php">
                        <!-- Logo icon -->
                        <b><img src="images/logo.png" alt="homepage" class="dark-logo"></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span style="">Admin</span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        
                        <!-- Messages -->
                        
                        
                    </ul><!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">

                        <!-- Search -->
                        
                        <!-- Comment -->
                        
                        <!-- End Comment -->
                        <!-- Messages -->
                        
                        <!-- End Messages -->
                        <!-- Profile -->
			<?php   include '../connect.php';
				$uname=$_SESSION['uname'];
				$sql = "select photo from users where username='$uname'";
				$res=$conn->query($sql);
				$row=$res->fetch_assoc();
				$img=$row["photo"];			
						
						
	?>		
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $img ;?>" class="profile-pic"></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="profile.php"><i class="ti-user"></i> Profile</a></li>                                    
                                    <li><a href="login_page.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar" style="overflow: visible;">
            <!-- Sidebar scroll-->
            <div class="slimScrollDiv" style="position: relative; overflow: visible; width: auto; height: 100%;"><div class="scroll-sidebar" style="overflow: hidden; width: auto; height: 100%;">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav active">
                    <ul id="sidebarnav" class="in">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li class="active"> <a href="admin_home.php" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </span></a></li>                        
                        <li class="nav-label">Update</li>		
                        <li class=""><a  class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Database</span></a>	<ul aria-expanded="false" class="collapse" style="height: 0px;">
                                	<li><a href="users.php">Users</a></li>
					<li><a href="items.php">Items</a></li>
					<li><a href="orders.php">Orders</a></li>
                                </ul></li>
			<li class=""><a id='drop' class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">User Pages</span></a>	<ul aria-expanded="false" class="collapse" style="height: 0px;">
				   <form id='page' action = "javascript:myfunc()" >
					<select id="sel" class='form-control'>                                	
					<option name = 'show' value = "1">Show Contact Page</option>
					<option name = 'hide' value = "2">Hide Contact Page</option>
					</select>
				   </form>
                                </ul></li>
			 <li id="contact" class="nav-label"></li>		
		    </ul>	
                </nav>
                <!-- End Sidebar navigation -->
            </div><div class="slimScrollBar" style="background: rgb(220, 220, 220) none repeat scroll 0% 0%; width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; left: 1px; height: 221.88px;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; left: 1px;"></div></div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper" style="min-height: 376px;">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                                </div>
                                <div class="media-body media-text-right">
 <?php

$sql = "select sum(o.quantity*i.price) as res from orders o,items i where o.item_id=i.id and o.status='Accepted'";
$res=$conn->query($sql);
$row=$res->fetch_assoc();
?>
<h2><?php echo $row['res'];?></h2>
                                    <p class="m-b-0">Total Revenue</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php

$sql = "select count(*) as num from orders";
$res=$conn->query($sql);
$row=$res->fetch_assoc();
?>
<h2><?php echo $row['num'];?></h2>
                                    <p class="m-b-0">Sales</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                                </div>
                                <div class="media-body media-text-right">
<?php

$sql = "select count(*) as num from items";
$res=$conn->query($sql);
$row=$res->fetch_assoc();
?>
<h2><?php echo $row['num'];?></h2>
                                    <p class="m-b-0">Items</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
<?php

$sql = "select count(*) as num from users where role = 'customer'";
$res=$conn->query($sql);
$row=$res->fetch_assoc();
?>
<h2><?php echo $row['num'];?></h2>
                                    <p class="m-b-0">Customers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row bg-white m-l-0 m-r-0 box-shadow ">

                    <!-- column -->
                    
                    <!-- column -->

                    <!-- column -->
                    
                    <!-- column -->
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-title">
                                <h4>Recent Orders </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
						<th>User</th>
                                                <th>Order Id</th>
                                                <th>Name</th>
                                                <th>Title</th>
						<th>Company</th>
                                                <th>quantity</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php   $sql1="select o.id,u.photo,u.name,i.title,i.company,o.quantity,o.time,o.status from orders o,items i,users u where i.id=o.item_id and u.username=o.username order by o.time desc limit 6";
	$res1=$conn->query($sql1);
	while($row1 = $res1->fetch_assoc())	{	echo "

                                            <tr>

                                                <td>						
                                                    <div class='round-img'>
                                                        <a href='users.php'><img src='".$row1['photo']."' alt=''></a>
                                                    </div>
                                                </td>
                                                <td><span>#". ucfirst($row1["id"])."</span></td>
                                                <td><span>". ucfirst($row1["name"])."</span></td>
                                                <td><span>". ucfirst($row1["title"])."</span></td>
						<td><span>". ucfirst($row1["company"])."</span></td>						
                                                <td><span>" . $row1["quantity"]." pcs</span></td>";
						 if($row1["status"]=="Accepted")
                                                	echo "<td><span class='badge badge-success'>Done</span></td>";
						else if($row1["status"]=="Rejected")
						 	echo "<td><span class='badge badge-warning' style='background-color:#ef3d47;'>Rejected</span></td>";
						else 
							echo "<td><span class='badge badge-warning' >Pending</span></td>
                                            </tr>";
					}?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
					
						<!-- /# column -->
						<div class="col-lg-6">
							<div class="card">
								<div class="card-body">
									<div class="year-calendar"><div class="pignose-calendar pignose-calendar-blue pignose-calendar-default">												<div class="pignose-calendar-top">													<a href="#" class="pignose-calendar-top-nav pignose-calendar-top-prev">														<span class="icon-arrow-left pignose-calendar-top-icon"></span>													</a>													<div class="pignose-calendar-top-date">														<span class="pignose-calendar-top-month">May</span>														<span class="pignose-calendar-top-year">2018</span>													</div>													<a href="#" class="pignose-calendar-top-nav pignose-calendar-top-next">														<span class="icon-arrow-right pignose-calendar-top-icon"></span>													</a>												</div>												<div class="pignose-calendar-header"><div class="pignose-calendar-week pignose-calendar-week-sun">SUN</div><div class="pignose-calendar-week pignose-calendar-week-mon">MON</div><div class="pignose-calendar-week pignose-calendar-week-tue">TUE</div><div class="pignose-calendar-week pignose-calendar-week-wed">WED</div><div class="pignose-calendar-week pignose-calendar-week-thu">THU</div><div class="pignose-calendar-week pignose-calendar-week-fri">FRI</div><div class="pignose-calendar-week pignose-calendar-week-sat">SAT</div></div>												<div class="pignose-calendar-body"><div class="pignose-calendar-row"><div class="pignose-calendar-unit pignose-calendar-unit-sun"></div><div class="pignose-calendar-unit pignose-calendar-unit-mon"></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-tue" data-date="2018-05-01"><a href="#">1</a></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-wed" data-date="2018-05-02"><a href="#">2</a></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-thu" data-date="2018-05-03"><a href="#">3</a></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-fri" data-date="2018-05-04"><a href="#">4</a></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-sat" data-date="2018-05-05"><a href="#">5</a></div></div><div class="pignose-calendar-row"><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-sun" data-date="2018-05-06"><a href="#">6</a></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-mon" data-date="2018-05-07"><a href="#">7</a></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-tue" data-date="2018-05-08"><a href="#">8</a></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-wed" data-date="2018-05-09"><a href="#">9</a></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-thu" data-date="2018-05-10"><a href="#">10</a></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-fri" data-date="2018-05-11"><a href="#">11</a></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-sat" data-date="2018-05-12"><a href="#">12</a></div></div><div class="pignose-calendar-row"><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-sun" data-date="2018-05-13"><a href="#">13</a></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-mon" data-date="2018-05-14"><a href="#">14</a></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-tue" data-date="2018-05-15"><a href="#">15</a></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-wed" data-date="2018-05-16"><a href="#">16</a></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-thu" data-date="2018-05-17"><a href="#">17</a></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-fri pignose-calendar-unit-active pignose-calendar-unit-first-active" data-date="2018-05-18"><a href="#">18</a></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-sat" data-date="2018-05-19"><a href="#">19</a></div></div><div class="pignose-calendar-row"><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-sun" data-date="2018-05-20"><a href="#">20</a></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-mon" data-date="2018-05-21"><a href="#">21</a></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-tue" data-date="2018-05-22"><a href="#">22</a></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-wed" data-date="2018-05-23"><a href="#">23</a></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-thu" data-date="2018-05-24"><a href="#">24</a></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-fri" data-date="2018-05-25"><a href="#">25</a></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-sat" data-date="2018-05-26"><a href="#">26</a></div></div><div class="pignose-calendar-row"><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-sun" data-date="2018-05-27"><a href="#">27</a></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-mon" data-date="2018-05-28"><a href="#">28</a></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-tue" data-date="2018-05-29"><a href="#">29</a></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-wed" data-date="2018-05-30"><a href="#">30</a></div><div class="pignose-calendar-unit pignose-calendar-unit-date pignose-calendar-unit-thu" data-date="2018-05-31"><a href="#">31</a></div><div class="pignose-calendar-unit pignose-calendar-unit-fri"></div><div class="pignose-calendar-unit pignose-calendar-unit-sat"></div></div></div>											</div></div>
								</div>
							</div>
					</div>
				    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Todo</h4>
                                <div class="card-content">
                                    <div class="todo-list">
                                        <div class="tdl-holder">
                                            <div class="tdl-content">
                                                <ul>
                                                    <li>
                                                        <label>
								<input type="checkbox"><i class="bg-primary"></i><span>Be a web developer</span>
															
									<a href="#" class="ti-close"></a>
														</label>
                                                    </li>
                                                    <li>
                                                        <label>
															<input  type="checkbox"><i class="bg-success"></i><span>Learn other major concepts</span>
															<a href="#" class="ti-close"></a>
														</label>
                                                    </li>
                                                    <li>
                                                        <label>
															<input checked="" type="checkbox"><i class="bg-warning"></i><span>Add theme to it</span>
															<a href="#" class="ti-close"></a>
														</label>
                                                    </li>
                                                    <li>
                                                        <label>
															<input checked="" type="checkbox"><i class="bg-danger"></i><span>Create an online shopping portal</span>
															<a href="#" class="ti-close"></a>
														</label>
                                                    </li>

                                                    <li>
                                                        <label>
															<input checked="" type="checkbox"><i class="bg-success"></i><span>Create a php webpage</span>
															<a href="#" class="ti-close"></a>
														</label>
                                                    </li>
                                                </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->

            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->


    <!-- Amchart -->
     <script src="js/lib/morris-chart/raphael-min.js"></script>
    <script src="js/lib/morris-chart/morris.js"></script>
    <script src="js/lib/morris-chart/dashboard1-init.js"></script>


	<script src="js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/pignose.init.js"></script>

    <script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="js/scripts.js"></script>
    <!-- scripit init-->

    <script src="js/custom.min.js"></script>
    <script>
		$("#page").change(function(){
			$("#drop").trigger("click");
			if($("#sel").val()=="1")
				localStorage.setItem('contact',1);
			else
				localStorage.setItem('contact',2);
			
		});
		
</script>	







</body>
</html>

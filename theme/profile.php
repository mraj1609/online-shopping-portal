<?php session_start();
if($_SESSION['logged']!=1){
header("Location: login_page.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Admin Profile</title>
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
						
				#else
				#	die("error in photo");		
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
            <div class="slimScrollDiv" style="position: relative; overflow: visible; width: auto; height: 100%;"><div class="scroll-sidebar" style=" width: auto; height: 100%;">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav active">
                    <ul id="sidebarnav" class="in">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li class="active"> <a href="admin_home.php" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </span></a>
                            
                        </li>
                        
                        
                        
                        <li class="nav-label">Database</li>
                        
						
                        <li class=""> 
                            
                        <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Storage</span></a><ul aria-expanded="false" class="collapse" style="height: 0px;">
                                <li><a href="users.php">Users</a></li><li><a href="items.php">Items</a></li><li><a href="orders.php">Orders</a></li>
                                
                                
                                
                                
                            </ul></li>
                        
                        
                        
                        
                        
                        
                        
                    
                </nav>
                <!-- End Sidebar navigation -->
            </div></div>
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
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-two">
                                    <header>
                                        <div class="avatar">
                                            <img src="<?php echo $img ;?>" alt="Allison Walker" />
                                        </div>
                                    </header>
<?php  
ob_start();
$flag=0;
if(isset($_POST['pass'])){
	$old=$_POST['oldPass'];
	$new=$_POST['newPass'];
	$sql="select password from users where username='$uname'";
	$res=$conn->query($sql);
	$row=$res->fetch_assoc();
	$pass=$row['password'];
	if($old==$pass){
		$sql1="update users set password='$new' where username='$uname'";
		if($conn->query($sql1)!==TRUE)
			die("error in updating password");
		$flag=3;
	}
	else{
		$flag=2;
	}
	
}
else if($_SERVER['REQUEST_METHOD']=="POST"){
	$name=$_POST['name'];
	$age=$_POST['age'];
	$nation=$_POST['nation'];
	$sql="update users set name='$name',age='$age',nationality='$nation' where username='$uname'";
	if($conn->query($sql)!==TRUE)
		die("error in update");
$flag=1;
}


$sql="select name,age,nationality from users where username = '$uname'";
$res=$conn->query($sql);
$row=$res->fetch_assoc();
$name=$row['name'];
$age=$row['age'];
$nation=$row['nationality'];

ob_end_flush();
?>
                                    <h3><?php echo "Hello ".$name ;?></h3>
                                    <div class="desc">
					Welcome to your Profile
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-12" >
                                                                <!--second tab-->
                                <?php if($flag==1) echo "<h5 style='color:blue'>Your profile was updated successfully!</h5>"; 
					else if($flag==2) echo "<h5 style='color:red'>Your Password couldn't be updated as your old password was wrong!</h5>";
					else if($flag==3) echo "<h5 style='color:blue'>Your Password was updated successfully!</h5>";?>
                                	<h4 style="color:green;">Update Profile</h4>
                                        <form action='#' method='post' class="form-horizontal form-material">
                                            <div class="form-group">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" value='<?php echo $name; ?>' name='name' class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Age</label>

                                                <div class="col-md-12">

                                                    <input type="number" value='<?php echo $age; ?>' name='age' class="form-control form-control-line">

                                                </div>

                                            </div>

                                            <div class="form-group">
                                            <div class="form-group">

                                                <label class="col-md-12">Nationality</label>

                                                <div class="col-md-12">

                                                    <input type="text" value='<?php echo $nation; ?>' name='nation' class="form-control form-control-line">

                                                </div>

                                            </div>

                                               
                                           
                                            <div class="form-group">
                                                
                                                    <input type="submit" value="Update Profile" >
                                                
                                            </div>
                                        </form>
                                    <a href="javascript:;" data-toggle="modal" data-target="#changePassModal"><i class="ti-user"></i><button type="button" class=" btn btn-success btn-rounded m-b-10 m-l-5" >Change Password</button></a>
                    </div>
                    <!-- Column -->
                </div>

               
                <!-- End PAge Content -->

                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->

            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>

    <div class="modal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="changePassModal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
                <form action="#" method='post' novalidate="novalidate">
                    <div class="modal-header">
                    <h5 class="modal-title">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <div class="form-group">
                                <label for="oldPass">
                                    old Password
                                </label>
                                <input type="password"  data-val="true" data-val-required="this is Required Field" class="form-control" name="oldPass" id="oldPass"/>
                                <span class="field-validation-valid text-danger" data-valmsg-for="oldPass" data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group">
                                <label for="newPass">
                                    New Password
                                </label>
                                <input type="password" data-val="true" data-val-required="this is Required Field" class="form-control" name="newPass" id="newPass"/>
                                <span class="field-validation-valid text-danger"  data-valmsg-for="newPass" data-valmsg-replace="true"></span>
                                
                            </div>
                            <div class="form-group">
                                <label for="confirmPass">
                                    Confirm Password
                                </label>
                                <input type="password" data-val-equalto="Password not Match ", data-val-equalto-other="newPass" data-val="true" data-val-required="this is Required Field" class="form-control" name="confirmPass" id="confirmPass"/>
                                <span class="field-validation-valid text-danger" data-valmsg-for="confirmPass" data-valmsg-replace="true"></span>
                                
                            </div>
                                        
                        </div>

                    </div>
                    <div class="modal-footer">
                    <button type="submit"  name='pass' class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
          </div>
        </div>
      </div>

    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/lib/form-validation/jquery.validate.min.js"></script>
    <script src="js/lib/form-validation/jquery.validate.unobtrusive.min.js"></script>
    <script src="js/lib/jquery.nicescroll/jquery.nicescroll.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
      
</body>

</html>

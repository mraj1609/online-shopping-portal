<?php 
session_start();
if($_SESSION['logged']!=1){
header("Location: login_page.php");
}
?>
<?php   include '../connect.php';
				$uname=$_SESSION['uname'];
				$sql = "select photo from users where username='$uname'";
				$res=$conn->query($sql);
				$row=$res->fetch_assoc();
				$img=$row["photo"];			
						
				#else
				#	die("error in photo");		
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
    <title>Items</title>
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
<div class="preloader" style="display: none;">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle> </svg>
    </div>
<div id="main-wrapper">
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
<div class="left-sidebar" style="overflow: visible;">
            <!-- Sidebar scroll-->
            <div class="slimScrollDiv" style="position: relative; overflow: visible; width: auto; height: 100%;"><div class="scroll-sidebar" style="overflow: hidden; width: auto; height: 100%;">
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
                        
                        
                        
                        
                        
                        
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div><div class="slimScrollBar" style="background: rgb(220, 220, 220) none repeat scroll 0% 0%; width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; left: 1px; height: 221.88px;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; left: 1px;"></div></div>
            <!-- End Sidebar scroll-->
        </div>
<div class="page-wrapper" style="min-height: 376px;">

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
<div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        
                        
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">ITEMS</h4>
				
<!--				<a href='items_update.php'><button type="button" class="btn btn-danger btn-rounded m-b-10 m-l-5" style="float:right;">Add item</button></a>-->
			<form id='add'  action='javascript:submitScript()'>
			<div class="dropdown" style="float:right;">
                                    <button id="up" class="btn btn-primary  dropdown-toggle" type="button" data-toggle="dropdown">Add Item
											<span class="caret"></span></button>
                                    <ul class="dropdown-menu dropdown-menu right" >
                                        
	<li><input style="border:2px solid lightblue;" class="form-control" type="text" name="category" placeholder='Category' pattern="electronics|furniture|grocery|clothing" title= "electronics, furniture, grocery or clothing " required></li>
    <li><input style="border:2px solid lightblue;" type="text" name="title" class="form-control" placeholder ="Title" required></li>
    <li><input type="text" name="company"  style="border:2px solid lightblue;" placeholder ="Company" class="form-control" required></li>
  <li><input type="number" name="price"  placeholder ="Price" style="border:2px solid lightblue;" class="form-control" required></li>
  <li><input type="number" name="qty"  placeholder ="Quantity" style="border:2px solid lightblue;" class="form-control" required></li>
  <li><input id = "close" class="btn btn-danger "  type="submit" value="Submit" ></li>
                                    </ul>
                                </div>  
		</form>
		<form id="file" action="upload.php" method='post' autocomplete="off" enctype="multipart/form-data"> 
	       	  <div class="dropdown" style="float:right; position:relative; left:-6px;">
			<button class="btn btn-primary dropdown-toggle" type='button' data-toggle="dropdown">Add Items By CSV<span class="caret" ></span></button>
			<ul class="dropdown-menu dropdown-menu right">
				<li><input type="file" name="item_file"  id="csv" accept=".csv" required></li>
				<li><input type='submit' class="btn btn-primary"  value="Upload" ></li>
			</ul>
		  </div>
		</form>
			<p id="result" style="color:red;"></p>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
						<th>Id</th>
                                                <th>Title</th>
                                                <th>Company</th>
						<th>Category</th>
                                                <th>Price</th>    
                                                <th>Quantity Sold</th>
						<th>Quantity Remaining</th>
						<th>Delete Item</th>
						<th>Update Item</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php 
ob_start();
include '../connect.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
	$sql1="select username from users";
	$res=$conn->query($sql1);
	while($row=$res->fetch_assoc()){
		$user=$row['username'];
		if(isset($_POST[$user])){
			$role = $_POST['Role'];  
			$sql="update users set role = '$role' where username = '$user'";
			if($conn->query($sql)!==TRUE){
				die("error in update");
			 }
		}
	}
}
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="delete from items where id = $id";
	if($conn->query($sql)!==TRUE)
		die("error in deletion");
}
$sql="select i.id, i.title, i.company, i.category, i.price, r.num, i.quantity from items i left join (select item_id,count(*) as num from orders group by item_id) as r on i.id=r.item_id ";
$res=$conn->query($sql);
if($res->num_rows > 0){

	while($row=$res->fetch_assoc()){
		$uname=$row['username'];
		if($row['num']==NULL)
			$row['num']=0;
		echo "<tr><td>#".$row['id']."</td><td>".$row['title']."</td><td>".$row['company']."</td><td>".$row['category']."</td><td>".$row['price']."</td><td>".$row['num']."</td><td>".$row['quantity']."</td><td><a href='items.php?id={$row['id']}'>Delete</a></td><td><form id='".$row['id']."'  action='javascript:submitScript(".$row['id'].")'>";
		echo '<div  class="dropdown" style="float:right;">
                                    <button class="btn btn-primary  dropdown-toggle" style="background-color:orange;" type="button" data-toggle="dropdown">Update
											<span class="caret"></span></button>
                                    <ul class="dropdown-menu dropdown-menu right" >
                                        
	<li><input style="border:2px solid lightblue;" class="form-control" type="text" name="category" value="'.$row['category'].'" pattern="electronics|furniture|grocery|clothing" title= "electronics, furniture, grocery or clothing " required></li>
    <li><input style="border:2px solid lightblue;" type="text" name="title" class="form-control" value="'.$row['title'].'" required></li>
    <li><input type="text" name="company"  style="border:2px solid lightblue;" value="'.$row['company'].'" class="form-control" required></li>
  <li><input type="number" name="price"  value="'.$row['price'].'" style="border:2px solid lightblue;" class="form-control" required></li>
  <li><input type="number" name="qty" value="'.$row['quantity'].'" style="border:2px solid lightblue;" class="form-control" required></li>
  <li><input type="hidden" name="id" value="'.$row['id'].'"></li>
  <li><input class="btn btn-danger " type="submit" value="Submit" ></li>
                                    </ul>
                                </div>  
		</form> </td></tr>';
	}
	echo "</tbody></table>";
}

ob_end_flush();
?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
			             
		 </div>
		
                <!-- End PAge Content -->
            </div>
</div>
</div>
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
<script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
    <script>
function submitScript(id){
	$("body").trigger("click");		//this closes the dropdown 
	var ajax=new XMLHttpRequest();
	ajax.onreadystatechange = function(){
		if(this.readyState==4 && this.status==200){
			//if(this.responseText == 'false')
			//	document.getElementById('result').innerHTML= "hello";//"your entry was added succesfully";
			//else
				document.getElementById('result').innerHTML=this.responseText;	
		}
	}; 
	if(id===undefined)
		ajax.open('GET','../back/insert.php?'+$('#add').serialize(),true);
	else
		ajax.open('GET','../back/insert.php?'+$('#'+id).serialize(),true);
	ajax.send();
}

function upload(){
	$("body").trigger("click");   //to close the dropdown
	$("#result").text($("#csv").val());
	//document.write($("#file").serialize().toString());
	$.post("upload.php",$("#file").serialize(),function(data,status){
		//$("#result").text(data.toString());
	});
}
</script>
</body>
</html>

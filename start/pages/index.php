<!DOCTYPE html>
<html><?php error_reporting(0); include'connect.php';?>
		<head>
			<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

			
			
			<title><?php if(isset($_SESSION['admin'])){echo 'Admin Portal';}elseif(isset($_SESSION['regno'])){echo 'Staff Portal';}else{echo 'Home';}?></title>
			
		</head>
		
 
		<body style="background-image: url(img/bg.jpg);background-size: contain;background-attachment: fixed; ">
<!--=====NAVIGAON ARENA=============----->
			
			 <nav class="navbar navbar-inverse" style="margin-bottom: 0px;">
  <div class="container-fluid">
  
			    <div class="navbar-header">
			      <a class="navbar-brand" href="../index.php">STAFF_MGT</a>
			    </div>
			    <ul class="nav navbar-nav">
			      <li class="active"><a href="../index.php">Home</a></li>
			       
			    </ul>
			  
    <ul class="nav navbar-nav navbar-right">
      
	
<?php if(isset($_SESSION['email'])){echo '<li><a href="logout.php"><span class="fa fa-log-in"></span>Logout</a></li>';}elseif(isset($_SESSION['admin'])){echo '<li><a href="logout.php"><span class="fa fa-log-in"></span>Logout</a></li><li><a href="addreg.php"><span class="fa fa-log-in"></span>Add Staff</a></li><li><a href="admin.php"><span class="fa fa-log-in"></span>Dashboard</a></li>';}else{echo '<li><a href="register.php"><span class="fa fa-user"></span> Sign Up</a></li>
     ';}?>
<?php if(isset($_SESSION['email'])){echo '';}elseif(isset($_SESSION['admin'])){echo '';}else{echo '<li><a href="login.php"><span class="fa fa-log-in"></span>Login</a></li>';}?>
    </ul>
  </div>
  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Tasks
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li class="dropdown-header">Your Task</li>
       <?php  if(isset($_SESSION['email'])){while($row = mysqli_fetch_assoc($query2))
	{$stagei=monitor($row["cat"],$row["stage"],$row["stage"]);	echo'<li><a href="portal.php?id='.$row["id"].'">'.$row['t_title'].' '.$stagei.'% complete</a></li>';
		
		
	}}?>
    </ul>
  </div>
  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Message
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
    	<?php $id=$_GET['id']; $qwery=mysqli_query($con,"SELECT * FROM taskprogress WHERE tid='$id'");?>
      <li class="dropdown-header">Your Task</li>
       <?php  while($row = mysqli_fetch_assoc($qwery))
	{	echo'<li>'.$row["comment"].'</li>';
		
		
	}?>
    </ul>
  </div>
</nav>
<br>
<br>
<br>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

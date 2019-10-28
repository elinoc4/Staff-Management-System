<?php
session_start();
error_reporting(E_ALL);
include"connect.php";
	if (isset($_POST['nomber'])) {
	$regno=$_POST['nomber'];
	$pword=$_POST['pword'];
	$table=$_POST['table'];

	if ($regno !='' && $pword != '') {
		if ($table == 'staffs') {
			$query = mysqli_query($con,"SELECT * FROM $table WHERE nomber='$regno' AND pword='$pword'")or die('an error occurred');
			$count=mysqli_num_rows($query);
			if ($count > 0) {
				
	$sql = "SELECT * FROM staffs WHERE nomber='$regno'";
$query=mysqli_query($con,$sql);
while ($row=mysqli_fetch_assoc($query)) {
	$reni=$row['email'];
}
				$_SESSION['email']=$reni;
				$_SESSION['pword']=$pword;

				header('Location:portal.php');

			}else{
			$msg = 'Wrong Password';
		}
			
		}else{
			$query = mysqli_query($con,"SELECT * FROM $table WHERE nomber='$regno' AND pword='$pword'");	
			$count=mysqli_num_rows($query);
			if ($count>0) {
				$sql = "SELECT * FROM admin WHERE nomber='$regno'";
$query=mysqli_query($con,$sql);
while ($row=mysqli_fetch_assoc($query)) {
	$reni=$row['email'];
}
				$_SESSION['admin']=$reni;
				$_SESSION['pword']=$pword;
				header('Location:admin.php');

			}else{
			$msg = 'Wrong Password';
		}		
		}
		
	}else{
		$msg = 'please fill in your details';
	}

}else{
	$msg = 'no data was sent';
}




?>
<head><meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Staff_MGT | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"></head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="indexe.html"><b>Staff_</b>MGT</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form   method="POST" action="login.php" enctype="multipart/form-data">
    	<div class="form-group has-feedback">
			
				<select class="form-control" name="table">
					<option class="form-control" value="admin">Admin</option>
					<option class="form-control" value="staffs">staffs</option>
				</select> 
           
	   </div>
      <div class="form-group has-feedback">
       <input type="text" name="nomber" placeholder="Number" class="form-control"  autofocus>
        <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" for="password" name="pword" placeholder="Password" class="form-control"  autofocus>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
										<input type="submit" name="submit" value="Login" class="btn btn-primary btn-block btn-flat"  autofocus>
        </div>
        <!-- /.col -->
      </div>
    </form>

    
    <!-- /.social-auth-links -->

    
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

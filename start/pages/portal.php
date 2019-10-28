<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['email'])){
header('Location:index.php');
die();
}

include"connect.php";
$email=$_SESSION['email'];
	/*if(!isset($_SESSION[$email])){
		
		header('Location:index.php');
	}*/
$email=$_SESSION['email'];
$query = mysqli_query($con,"SELECT * FROM staffs WHERE email='$email'");

	while($row = mysqli_fetch_assoc($query))
	{
		
		$stdId=$row['id'];
	
		
		
		
	}
$query1 = mysqli_query($con,"SELECT * FROM task WHERE sid='$stdId'");
$query2 = mysqli_query($con,"SELECT * FROM task WHERE sid='$stdId'");

	while($row = mysqli_fetch_assoc($query1))
	{
		
	
	
		$stage=$row['stage'];
		$cated=$row['cat'];
		
		
	}
		

echo $stage;
$rstage = $stage;
$name = strtoupper($name);
	$msg='';
	if($cState==''){
		$msg= $name.' Your Task has been Approved';
	}elseif($cState=='Decline'){
		$msg=$name.' Your Task has been Declined';
	}elseif($cState=='submitted'){
		$msg=$name.' You\'ve submitted your Task and its awaiting approval';
	}
	if(isset($_POST['t_title'])){
		$lname = "img/";
		$msg="";
		$cname=basename($_FILES['doc']['name']);
		$imgcheck=pathinfo($cname,PATHINFO_EXTENSION);
		if($cState=='submitted')
		{
			$msg ='you have one pending already';
		}
		else
		{
				if ($imgcheck == "ppt") 
				{
					$t_title=$_POST['t_title'];
					$ide=$_POST['id'];
					
					$status = 'submitted';

							 	$sql= "INSERT INTO taskProgress (tid , t_title,status) VALUES ('$ide', '$t_title','$status')";
								$query=mysqli_query($con, $sql)or die(mysqli_error($con));
								
								$newname = "../img/$t_title.ppt";
									$upload=move_uploaded_file( $_FILES['doc']['tmp_name'], "$newname");
									

								
							 
							 $msg = 'submitted';
							
					 
				}else{
						$msg= "<span class='txt-warning'>please choose a power point file</span>";
					
					
				}
	
	}
}

?>
<?php function monitor($cated,$rstage,$stage){
if($cated=='monthly'){

$d=12;
	if($rstage==12){

	$class='hidden';}
}
elseif($cated== 'weekly')
{
$d=7;
	if($rstage==7)
	{

		$class='hidden';
	}
}
else
{
	$d=1;
	if($rstage==1)
	{

	$class='hidden';
	}
} 
$per=100/$d;

switch($stage){
	case 1:
	$stage =$per;
break; 
case 2:
$stage = $per * 2;
break;
case 3:
$stage = $per * 3;
	break;
case 4:
$stage = $per * 4;
	break;
case 5:
$stage = $per * 5;
	break;
case 6:
$stage = $per * 6;
	break;
case 7:
$stage = $per * 7;
	break;
case 8:
$stage = $per * 8;
	break;
case 9:
$stage = $per * 9;
	break;
case 10:
$stage = $per * 10;
	break;
case 11:
$stage = $per * 11;
	break;
case 12:
$stage = $per * 12;
	break;

	}

$stage = number_format($stage);
return $stage;

}


?>

<?php include"index.php";?>

<div class="container">
			<!---------Navigation area----->
				<div class="container col-md-4" id="bg">
					<div class="row">
						<div class=""></div>
					</div>
				</div>

						
					<div class="col-md-6 " id="form">
						
						<form class="form-horizontal <?php if(isset($class)){echo $class;}?> " role="form" enctype="multipart/form-data" method="POST" action="portal.php">
				            
				            <div class="form-group">
								<div class="col-md-6">
									<input type="text" value="<?php echo $_GET['id']?>" name="id" placeholder="Thesis Title" class="form-control hidden" required autofocus>
				                </div>
				            </div>
				            <div class="form-group">
								<div class="col-md-6">
									<input type="text" name="t_title" placeholder="Thesis Title" class="form-control" required autofocus>
				                </div>
				            </div>
				            
				            <div class="form-group">
								<div class="col-md-6 <?php if(isset($class)){echo $class;}?>">
									<input type="file" name="doc" placeholder="Upload a power point document" class="form-control" required autofocus>
				                </div>
				            </div>
				            <div class="form-group">
								<div class="col-md-6">
									<input type="<?php if(isset($class)){echo $class;}else{echo "submit";}?>" name="submit"  class="form-control btn-success" value="PROCESS" required autofocus>
				                </div>
				            </div>
				
				           
				        </form>
				    </div>

				</div>
				<span id="paste"></span>
			</div>

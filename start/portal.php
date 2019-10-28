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
		$taskid=$row['id'];
		
		
	}
		


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
					$side=$_POST['sid'];
					$name=$_POST['name'];
					
					$status = 'submitted';

							 	$sql= "INSERT INTO taskprogress (tid , t_title,status,sid,name) VALUES ('$ide', '$t_title','$status','$side','$name')";
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

<?php include"index1.html";?>



						
					
			<div class="box">
            <div class="box-header">
              <h3 class="box-title">Task and Progress</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tr>
                  <th style="width: 10px">Code</th>
                  <th>Task</th>
                  <th>Progress</th>
                  <th style="width: 40px">Percentage</th>
                </tr>
<?php $tt=tasks($stdId);  while($row = mysqli_fetch_assoc($tt))
  {$stagei=monitor($row["cat"],$row["stage"],$row["stage"]);
  echo'<tr>
                  <td>'.$row["id"].'</td>
                  <td>'.$row["t_title"].'</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-info" style="width: '.$stagei.'%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-blue">'.$stagei.'%</span></td>
                </tr>';

    
    
  }?>

  
                
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
<?php include'footer.php';?>
		
	

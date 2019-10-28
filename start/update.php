<?php
error_reporting(0);
include"connect.php";
	$daily=1;$weekly=7;$monthly =12;
 	if (isset($_POST['approve'])) {
 		$id = $_POST['approve'];
 		$com = $_POST['comment'];
 		
 
		$increase = mysqli_query($con,"SELECT * FROM taskProgress WHERE id= '$id'");
		while($row = mysqli_fetch_assoc($increase)){
		$tide =$row['tid'];
	
		}
		$increase1 = mysqli_query($con,"SELECT * FROM task WHERE id= '$tide'");
		while($row = mysqli_fetch_assoc($increase1)){
		$stage =$row['stage'];
		$cat =$row['cat'];
		
		}
$staged=$stage + 1;
$pdh="monthly";
$dait_com=date('d.m.Y');
			
	if($cat ==$pdh && $stage==$monthly){
		$query4 = mysqli_query($con,"UPDATE task SET date_com='$dait_com'  WHERE id ='$tide'");

		echo'This Task has been completed';die();
		}elseif($cat =="daily" && $stage==$daily){
		$query4 = mysqli_query($con,"UPDATE task SET date_com='$dait_com'  WHERE id ='$tide'");

		echo'This Task has been completed';die();
		}elseif($cat =="weekly" && $stage==$weekly){
			$query4 = mysqli_query($con,"UPDATE task SET date_com='$dait_com'  WHERE id ='$tide'");

		
		echo'This Task has been completed';die();
		}else{
$query = "UPDATE taskProgress SET comment='$com', status =''   WHERE id ='$id'";
			
		 $update=mysqli_query($con, $query)or die(mysqli_error($con));
echo 'Succesful '.strtoupper($name);
		 if ($update) {
			$query3 = mysqli_query($con,"UPDATE task SET stage='$staged'  WHERE id ='$tide'");


		}
		
		
		}

	}
		
	


	if (isset($_POST['decline'])) {
 		
 		$id=$_POST['decline'];
		
		
			$query = "UPDATE taskProgress SET comment='$com', status = 'Decline'   WHERE id ='$id'";
		 $update=mysqli_query($con, $query)or die(mysqli_error($con));
echo 'Succesful'.strtoupper($name);;
		if ($update) {
			$subject ="Thesis notification";
			$message ="Your THESIS has been Declined. Submit something more substantial";
			$from = "elinoc4@gmail.com";
			mail($email, $subject, $message,$from);
		}
		
		
		
	}


	



	


?>

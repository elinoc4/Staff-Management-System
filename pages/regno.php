<?php


include'connect.php'; 
$output = '';
$strng =$_POST["search"];
$check = mysqli_query($con,"SELECT * FROM staffs WHERE nomber='$strng'");
$count=mysqli_num_rows($check);
$checki = mysqli_query($con,"SELECT * FROM verified WHERE regno='$strng'");
$counti=mysqli_num_rows($checki);
if ($count>0) {
	echo "<span class='label label-warning'>Taken, use another</span>";
}
elseif ($counti==1) {
	echo "you've been validated";
	
}else{
	echo "<span class='label label-danger'>you've not been validated</span>";
}

?>



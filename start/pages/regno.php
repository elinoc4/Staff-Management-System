<?php


include'connect.php'; 
$output = '';
$strng =$_POST["search"];
$check = mysqli_query($con,"SELECT * FROM verified WHERE regno='$strng'");
$count=mysqli_num_rows($check);

if ($count==1) {
	echo "youve been validated";
}else{
	echo "<span class='label label-danger'>you've not been validated</span>";
	
}

?>
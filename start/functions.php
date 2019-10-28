<?php 
function check($status,$id){
	include"connect.php";
	$sql = "SELECT * FROM taskprogress WHERE status='$status' AND sid='$id'";
$query=mysqli_query($con,$sql);
return $query;
}
function checki($status){
	include"connect.php";
	$sql = "SELECT * FROM taskprogress WHERE status='$status' ";
$query=mysqli_query($con,$sql);
return $query;
}
function checkd(){
	include"connect.php";
	$sql = "SELECT * FROM taskprogress";
$query=mysqli_query($con,$sql);
return $query;
}
function staff(){
	include"connect.php";
	$sql = "SELECT * FROM task";
$query=mysqli_query($con,$sql);
return $query;
}
function tasks($id){
	include"connect.php";
	$sql = "SELECT * FROM task WHERE sid='$id'";
$query=mysqli_query($con,$sql);
return $query;
}
function loop($q){
	while ($row=mysqli_fetch_assoc($q)) {
		$di=$row['id'];
	}
	return $di;
}
function loopi(){
	include"connect.php";
	$sql = "SELECT * FROM taskprogress";
$q=mysqli_query($con,$sql);
	while ($row=mysqli_fetch_assoc($q)) {
		$stt=$row['status'];}
		$stti=$stt;
	if ($stti=='') {
		$stat='approved';
	}elseif($stti=='Decline'){
		$stat='Declined';
	}else{
		$stat='submitted';
	}
	return $stat;
}

function staffs(){
	include"connect.php";
	$sql = "SELECT * FROM staffs";
$query=mysqli_query($con,$sql);
return $query;
}
function staffc($email){
	include"connect.php";
	$sql = "SELECT * FROM staffs WHERE email='$email'";
$query=mysqli_query($con,$sql);
return $query;
}

function cout($i){
	$kriga=mysqli_num_rows($i);
	return $kriga;
	
}
function progress($id){
	include"connect.php";
	$sql = "SELECT * FROM taskprogress WHERE tid='$id'";
$query=mysqli_query($con,$sql);
return $query;
}

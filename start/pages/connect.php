<?php  

$db_host = "localhost:3306"; 
// Place the username for the MySQL database here 
$db_username = "kinetic1_Elijah";  
// Place the password for the MySQL database here 
$db_pass = "32CqJ]UHn1nq2+";  
// Place the name for the MySQL database here 
$db_name = "kinetic1_ThesisMgt"; 

// Run the actual connection here  
$con=mysqli_connect("$db_host","$db_username","$db_pass") or die ("could not connect to mysql");
mysqli_select_db($con,"$db_name") or die ("no database");              
?>

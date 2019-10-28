<?php
session_start();
if(!isset($_SESSION['admin'])){
header('Location:../index.php');
die();
}
 include'index.php';
include'connect.php';
if(isset($_POST['course']))
{
$unitNumber = count($_POST['course']);
$course = $_POST['course'];
for ($i=0; $i < $unitNumber; $i++) 
  { 
  
	$insert= mysqli_query($con,"INSERT INTO verified (regno)VALUES ('$course[$i]') ");

	
	
  }
}
?>
<div class="container"><div class="row"><div class="col-md-4"></div> <div class="col-md-4"><form class="form-group "  action="addreg.php"  class=" " method="POST">
                    
                    
     <table id="dtable"><tr> <td><input type="text" id="unit" name="course[]" class="form-control btn-info" placeholder="Phone Number" required></td><td><p name="add" class="btn btn-success btn-add" id="ad">+</p></td>
     </tr>
    
     <input type="submit" name="submit" id="submit" value="submit" class="btn btn-info">
     </table>
                            </form></div>   <div class="col-md-4"></div></div></div>

                       <script type="text/javascript" src="js/jquery.js"></script>
                       <script type="text/javascript" src="js/addmore.js"></script>
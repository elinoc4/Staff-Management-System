<?php
 include'index1.html';
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
<div class="box">
<form class="form-group "  action="addreg.php"  class=" " method="POST">
                    
                    
     <div id="dtable"><input type="text" id="unit" name="course[]" class="form-control btn-info" placeholder="Phone Number" required><!--<p name="add" class="btn btn-success btn-add" id="ad">+</p>--->
    
     <input type="submit" name="submit" id="submit" value="submit" class="btn btn-info">
     </div>
                            </form>
</div>
                       <script type="text/javascript" src="js/jquery.js"></script>
                       <script type="text/javascript" src="js/addmore.js"></script>
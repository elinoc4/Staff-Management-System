<?php

include'index1.html';
include'connect.php';
$sub =checki('submitted');
?><?php if ($sub!='') {?>
<div class="container">
		<div class="row">
			<div class="col-md-6"><h1 class="display-3 text-warning">Submitted Task</h1>
 
	<ul class="list-group ">
			<?php
				while($row= mysqli_fetch_array($sub))
			{
				?><div class="text-primary">
<h6 class="list-group-item col-md-4 col-sm-2" ><?php echo $row["name"];?></h6><h6 class="list-group-item col-md-4 col-sm-2"><?php echo $row["t_title"];?></h6><h6 class="col-md-2"><a href="<?php echo "admindisplay.php?id=".$row["id"]; ?>" ><input type="button" id="'.$row["id"].'" name="decline" class="btn btn-info" value="view"/></a></h6></div></br></br></br></br>

				<?php


			}?></ul>
		</div><?php
			
			}else{
				echo'<div class="alert alert-primary">No task has been submitted</div>';

			}?>
			

		
		
				
		


<?php include'footer.php';?>
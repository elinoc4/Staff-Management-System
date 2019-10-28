<?php

include'index1.html';include'connect.php';?>

<div class="container">
				<div class="row">
					
					<div class="col-md-6 " id="form">
						
						<form class="form-horizontal <?php if(isset($class)){echo $class;}?> " role="form" enctype="multipart/form-data" method="POST" action="admin.php">
				            
				            <div class="form-group">
								<div class="col-md-6">
									
										<select class="form-control " name="category">
											<?php $query=mysqli_query($con,"SELECT * FROM staffs"); while ($row=mysqli_fetch_assoc($query)) {
											 echo'<option class="form-control" value="'.$row['id'].'"  >'.$row['name'].'</option>';}?>
											
										</select> 
					                </div>
				            </div>
				             
				            <div class="form-group">
									<div class="col-md-6">
										<input type="text" name="t_title" placeholder="Task Title" class="form-control" required autofocus>
					                </div>
					            </div>
					            <div class="form-group">
									<div class="col-md-6">
										<select class="form-control" name="cat">
											<option class="form-control" value="daily">Daily</option>
											<option class="form-control" value="weekly">Weekly</option>
											<option class="form-control" value="monthly">Monthly</option>
										</select> 
					                </div>
					            </div>
					            
				            <div class="form-group">
								<div class="col-md-6 <?php if(isset($class)){echo $class;}?>">
									<input type="file" name="doc" placeholder="Upload a power point document" class="form-control"  autofocus>
				                </div>
				            </div>
				            <div class="form-group">
								<div class="col-md-6">
									<input type="<?php if(isset($class)){echo $class;}else{echo "submit";}?>" name="submit"  class="form-control btn-success" value="ASSIGN" required autofocus>
				                </div>
				            </div>
				
				           
				        </form>
				    </div>
				</div>
			</div>
<?php			
include'footer.php';
?>
<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['email'])){
header('Location:login.php');
die();
}
include'index1.html';
include'connect.php';

?>

<div  id="form">
						
						<form class="form-horizontal <?php if(isset($class)){echo $class;}?> " role="form" enctype="multipart/form-data" method="POST" action="portal.php">
				            
				            <div class="form-group">
								<div class="col-md-6">
									<input type="text" value="<?php echo $_GET['id']?>" name="id" placeholder="Thesis Title" class="form-control hidden" required autofocus>
				                </div>
				            </div>
				            <div class="form-group">
								<div class="col-md-6">
									<input type="text" value="<?php echo $_GET['sid']?>" name="sid" placeholder="Thesis Title" class="form-control hidden" required autofocus>
				                </div>
				            </div>
				             <div class="form-group">
								<div class="col-md-6">
									<input type="text" value="<?php echo $_GET['name']?>" name="name" placeholder="Thesis Title" class="form-control hidden" required autofocus>
				                </div>
				            </div>
				            <div class="form-group">
								<div class="col-md-6">
									<input type="text" name="t_title" placeholder="Thesis Title" class="form-control" required autofocus>
				                </div>
				            </div>
				            
				            <div class="form-group">
								<div class="col-md-6 <?php if(isset($class)){echo $class;}?>">
									<input type="file" name="doc" placeholder="Upload a power point document" class="form-control" required autofocus>
				                </div>
				            </div>
				            <div class="form-group">
								<div class="col-md-6">
									<input type="<?php if(isset($class)){echo $class;}else{echo "submit";}?>" name="submit"  class="form-control btn-success" value="PROCESS" required autofocus>
				                </div>
				            </div>
				
				           
				        </form>
				    </div>

				</div>

				<span id="paste"></span>
			</div>
		
				
		


<?php include'footer.php';?>
<?php

//initiate connection
include"connect.php";
$regno=$_SESSION['admin'];

$status= 'submitted';
// FETCH ALL STUDENT THAT HAVE SUBMITTED
$sql = "SELECT * FROM taskProgress WHERE status='$status'";
$query=mysqli_query($con,$sql);
$sql1 = "SELECT * FROM taskProgress WHERE status=''";
$query1=mysqli_query($con,$sql1);
//---==========Count Number of Student That Have Submitted There Thesis=======
$as=checki('submitted')
$count = mysqli_num_rows($query);
	$msg = '';
	?>
	
<?php $msg = $count.' Staff(s) waiting for your approval';
 include"index.php";
?>

<?php if ($count > 0) {?>
	<div class="container">
		<div class="row">
			<div class="col-md-6"><h1 class="display-3 text-warning">Submitted Task</h1>
 
	<ul class="list-group ">
			<?php 
			while($row= mysqli_fetch_array($query))
			{
				?><div class="text-primary">
<h6 class="list-group-item col-md-4 col-sm-2" ><?php echo $row["id"];?></h6><h6 class="list-group-item col-md-4 col-sm-2"><?php echo $row["t_title"];?></h6><h6 class="col-md-2"><a href="<?php echo "admindisplay.php?id=".$row["id"]; ?>" ><input type="button" id="'.$row["id"].'" name="decline" class="btn btn-info" value="view"/></a></h6></div></br></br></br></br>

				<?php


			}
			?>

		</ul>
		</div>
		
				
		<?php	
			
		}else{
			$msg ='<h1 class="col-md-6">No student has submitted yet</h1>';

		}?>

		<div class="col-md-6">
			<h1 class="display-3 text-info">Approved Task</h1>
			
			
					<h6 class=" list-group-item col-md-6">Staff Name</h6> <h6 class="list-group-item col-md-6">Task</h6>
					<?php
			while ($row = mysqli_fetch_assoc($query1)) {?>
<div class="text-primary">
<h6 class=" list-group-item col-md-6"><?php echo $row["tid"];?></h6> <h6 class="list-group-item col-md-6"><?php echo $row["t_title"];?></h6></div></br>

		<?php	}
			?>
			
		</div>
		</div>
		</div>
	
	</br>
	</br>
	</br>
	<?php
	if(isset($_POST['t_title']))
	{
		    $lname = "img/";
			$msg="";
			$cname=basename($_FILES['doc']['name']);
			$imgcheck=pathinfo($cname,PATHINFO_EXTENSION);
		if ($imgcheck != "ppt") {
			$msg= '<span class="txt-warning">please choose a power point file</span>';
			
			
		}
		else
		{
				// collecting data
				$id=$_POST['category'];
				$t_title=$_POST['t_title'];
				$cat=$_POST['cat'];
				$dait=date('d.m.Y');
				
				$query="INSERT INTO task (sid,t_title,date_given,cat)VALUES('$id','$t_title','$dait','$cat')";
				$insert= mysqli_query($con,$query)or die(mysqli_error($con));
				//=====working on the document=======
				$newname = "../img/$t_title";
				$upload=move_uploaded_file( $_FILES['doc']['tmp_name'], "$newname");

			}
			
			}
			
				?>

		<div class="container">
				<div class="row">
					
					<div class="col-md-6 " id="form">
						
						<form class="form-horizontal <?php if(isset($class)){echo $class;}?> " role="form" enctype="multipart/form-data" method="POST" action="admin.php">
				            
				            <div class="form-group">
								<div class="col-md-6">
									<div>
										<label>Task to:</label>
									</div>
										<select class="form-control" name="category">
											<?php $query=mysqli_query($con,"SELECT * FROM staffs"); while ($row=mysqli_fetch_assoc($query)) {
											 echo'<option class="form-control" value="'.$row['id'].'">'.$row['name'].'</option>';}?>
											
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
				<span id="paste"></span>
			</div>

</body>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>



</html>

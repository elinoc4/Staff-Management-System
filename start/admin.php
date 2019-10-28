<?php
//initiate connection
include"index1.html";
include"connect.php";

$regno=$_SESSION['admin'];


// FETCH ALL STUDENT THAT HAVE SUBMITTED



//---==========Count Number of Student That Have Submitted There Thesis=======
$task=staff();
$ap =check('');
$sub =check('submitted');
$count = cout($sub);
$countap=cout($ap);

	$msg = '';
	
	?>
	
<?php $msg = $count.' Staff(s) waiting for your approval';

?>

<?php if ($count > 0) {?>
	<div class="container">
		<div class="row">
			<div class="col-md-6"><h1 class="display-3 text-warning center">Submitted Task</h1>
 
	<ul class="list-group ">
			<?php 
			while($row= mysqli_fetch_array($sub))
			{
				?><div class="text-primary">
<h6 class="list-group-item col-md-4 col-sm-2" ><?php echo $row["name"];?></h6><h6 class="list-group-item col-md-4 col-sm-2"><?php echo $row["t_title"];?></h6><h6 class="col-md-2"><a href="<?php echo "admindisplay.php?id=".$row["id"]; ?>" ><input type="button" id="'.$row["id"].'" name="decline" class="btn btn-info" value="view"/></a></h6></div></br></br></br></br>

				<?php


			}
			?>

		</ul>
		</div>
		
				
		<?php	
			
		}else{
			$msg ='<h1 class="col-md-6">No student has submitted yet</h1>';

		}?>
 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Staff with Task(s)</h3>

              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>User</th>
                  <th>Date Assigned</th>
                  <th>Task Title</th>
               
                </tr>
                
					<?php
			while ($row = mysqli_fetch_assoc($task)) {

            echo'<tr>
                  <td><a href="tasks.php?id='.$row["id"].'">'.$row["id"].'</a></td>
                  <td><a href="tasks.php?id='.$row["id"].'">'.$row["name"].'</a></td>
                  <td><a href="tasks.php?id='.$row["id"].'">'.$row["date_given"].'</a></td>
               
                  <td><a href="tasks.php?id='.$row["id"].'">'.$row["t_title"].'</a></td>
                </tr>';}?>
                
            </table>
        </div>
    </div>

		
	
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
				$query=mysqli_query($con,"SELECT * FROM staffs WHERE id='$id'"); while ($row=mysqli_fetch_assoc($query)) {
											$namei= $row['name'];}
											
				$t_title=$_POST['t_title'];
				$cat=$_POST['cat'];
				$name=$namei;
				$dait=date('d.m.Y');
				
				$query="INSERT INTO task (sid,name,t_title,date_given,cat)VALUES('$id','$name','$t_title','$dait','$cat')";
				$insert= mysqli_query($con,$query)or die(mysqli_error($con));
				//=====working on the document=======
				$newname = "../img/$t_title";
				$upload=move_uploaded_file( $_FILES['doc']['tmp_name'], "$newname");

			}
			
			}
			
				?>

					<?php include'footer.php';?>

</body>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>



</html>

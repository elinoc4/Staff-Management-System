<?php
include'index1.html';
$id= $_GET['id'];
//initiate connection

include"connect.php";

// FETCH ALL STUDENT THET HAVE SUBMITTED
$query = mysqli_query($con,"SELECT * FROM taskProgress WHERE id = '$id'");
$count = mysqli_num_rows($query);
	$msg = '';


		




?>
<!DOCTYPE html>


<?php if ($count > 0) {?>
 <?php  ?>
	<div class="container">
<div id="detail" class="alert alert-info" role="alert" type="hidden" style="display:none;"></div>
			<ul class="list-group">
				<li class="list-group-item row">
			<?php 
			while($row= mysqli_fetch_array($query))
			{$file=$row["t_title"];
			$output='<p class="col-md-9">'.$row["tid"]. ' '.$row["t_title"].'</p><input type="text" id="com" class="form-control" name="com" placeholder="Comment?"><a href="../img/'.$file.'.ppt" download><i class="glyphicon glyphicon-download"></i>'.$row["t_title"].'</a> <input type="button" id="'.$row["id"].'" name="approve" class="btn btn-info" value="Approve" /><button id="'.$row["id"].'" name="decline" class="btn btn-info" value="">Decline</button>';
				

echo $output;
echo $row['id'];
			}
			?>

		</div>
				
		<?php
			
		}else{
			$msg ='No student has submitted yet';

		}

echo $msg;
?>

</body>
<script type="text/javascript" src="jquery-1.9.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.btn').click(function(){
			var approve = $(this).attr("id");
			var comment = $('#com').val();

			$.ajax({
				url:"update.php",
				method:"post",
				data:{approve:approve,comment:comment},
				success:function(data){
				$('#detail').show().html(data);
				$('input').hide();
					
				}

			});
			
		});
		

	});
	

</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('button').click(function(){
			var decline = $(this).attr("id");

			$.ajax({
				url:"update.php",
				method:"post",
				data:{decline:decline},
				success:function(data){
				$('#detail').show().html(data);
				$('input').hide();
				}

			});
			
		});
		

	});
	

</script>
</html>


<?php
include'index1.html';
include'connect.php';
?>
		
			<div class="box">
            <div class="box-header">
              <h3 class="box-title">Task and Progress</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tr>
                  <th style="width: 10px">Code</th>
                  <th>Name</th>
                  <th>Response</th>
                  <th>Status</th>
                </tr>
<?php  
		

		
	 $tt=checkd();  while($row = mysqli_fetch_assoc($tt))
  {$stti=$row["status"];
  if ($stti=='') {
  	$class='success';
		$stat='approved';
	}elseif($stti=='Decline'){
		$stat='Declined';
		$class='danger';
	}else{
		$stat='submitted';
		$class='warning';
	}
  echo'<tr>
                  <td>'.$row["id"].'</td>
                  <td>'.$row["name"].'</td>
                  <td>'.$row["t_title"].'</td>
                  <td>
                    				<span class="label label-'.$class.'">'.$stat.'</span>

                  </td>
                </tr>';}

    
    
  echo $statum?>

  
                
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
<?php include'footer.php';?>

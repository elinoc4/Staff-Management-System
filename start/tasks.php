<?php
include'index1.html';

$id=$_GET['id'];

$pro=progress($id);?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Task(s) Response</h3>

              
            </div>
<div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  
                  <th>Name</th>
                  <th>Response</th>
               
                </tr>
                
					<?php
			while ($row = mysqli_fetch_assoc($pro)) {

            echo'<tr>
                  <td>'.$row["name"].'</td>
                  <td>'.$row["t_title"].'</td>
                  
                </tr>';}?>
                
            </table>
        </div>
       




<?php include'footer.php';?>


</body>
</html>
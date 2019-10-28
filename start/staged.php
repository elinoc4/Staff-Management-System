<?php
function monitor($cated,$rstage,$stage){
if($cated=='monthly'){

$d=12;
	if($rstage==12){

	$class='hidden';}
}
elseif($cated== 'weekly')
{
$d=7;
	if($rstage==7)
	{

		$class='hidden';
	}
}
else
{
	$d=1;
	if($rstage==1)
	{

	$class='hidden';
	}
} 
$per=100/$d;

switch($stage){
	case 1:
	$stage =$per;
break; 
case 2:
$stage = $per * 2;
break;
case 3:
$stage = $per * 3;
	break;
case 4:
$stage = $per * 4;
	break;
case 5:
$stage = $per * 5;
	break;
case 6:
$stage = $per * 6;
	break;
case 7:
$stage = $per * 7;
	break;
case 8:
$stage = $per * 8;
	break;
case 9:
$stage = $per * 9;
	break;
case 10:
$stage = $per * 10;
	break;
case 11:
$stage = $per * 11;
	break;
case 12:
$stage = $per * 12;
	break;

	}

$stage = number_format($stage);

return $class;

}



$(function(){
$('#p1,#p2').keyup(function(){
	var p1=$('#p1').val();
	var p1l=$('#p1').val();
	var p2=$('#p2').val();
	if (p1.length < 6) {
		$('#pw2').html('<span class="label label-danger">your password is too short</span>')
	}else if (p1 != p2){
		$('#pw2').html('<span class="label label-danger">Password Don\'t match</span>')
	}else{
			$('#pw2').html('<span class="label label-success">Passwords now match</span>')
	
	}
});

});

$('#regno').keyup(function(){
var txt = $(this).val();
if(txt != '')
{
$.ajax({
url:"../pages/regno.php",
method:"post",
data:{search:txt},
dataType:"text",
success:function(data){
	$('#result').html(data);
	

if(data =="youve been validated") {
$('#submit').show();
}else{
	$('#submit').hide();
}
}



});
}else{

	$('#result').html('<span class="label label-danger">please these field can\'t be empty!!!</span>')
}

		});

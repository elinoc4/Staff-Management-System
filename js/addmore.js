$(function(){
	var i =1;
		$('#ad').click(function(){
			i++;
	$('#dtable').append('<tr id="row'+i+'"><td><input type="text" id="course" name="course[]" placeholder="Matric N0" class="form-control btn-primary" required></td><td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove" id="remove">X</button></td></tr>');
			});
		$(document).on('click', '.btn_remove', function(){
			var buttonid = $(this).attr("id");
			$("#row"+buttonid+'').remove();
		});
	
			
			

	});

/*$(function(){
	$('#submit').click(function(){
		var unit = parseInt($('#unit').val);
		var grade = $('#grade').val;
		var grad = (unit)
		var arr = [unit, grade];

for (var i=0; i < 40; i++) 
	{ 
		var uni=arr[0][i];
		var gra=arr[1][i];
		var calc = gra*uni;
		var total = calc + total;
		var uti = 0;
		var un = uni ;
		var ut = un +ut;

	
	
}

	gp=total/ut;
	 
	alert("your GP is    "+unit);



});
});*/

$(document).ready(function(){
	var value = false;

	$('.dropdown-menu').hide();
	
	$('#dropdownMenu1').click(function(){
		if(value == false){
			$('.dropdown-menu').show();
			value = true;
			$('dropfocus').focus();
		}
		else{
			$('.dropdown-menu').hide();
			value = false;
		}
	});

	$('.dropdown-menu a').click(function(){
		var holder = $(this).html();
		$('#dropdownMenu1').text(holder + " ");
		$('.dropdown-menu').hide();
		$('#numAttending').focus();
		value = false;
	});
});
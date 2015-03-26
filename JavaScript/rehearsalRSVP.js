$(document).ready(function(){
	var value = false;

	$('.dropdown-menu').hide();
	
	$('#dropdownButton').click(function(){
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
		$('#dropdownButton').text(holder + " ");
		$('.dropdown-menu').hide();
		$('#numAttending').focus();
		value = false;
	});
});
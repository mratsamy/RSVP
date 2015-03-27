$(document).ready(function(){
	var value = false;

	$('.dropdown-menu').hide();
	
	$('#lastnameLetter').click(function(){
		if(value == false){
			$('.dropdown-menu').show();
			value = true;
		}
		else{
			$('.dropdown-menu').hide();
			value = false;
		}
	});

	$('.dropdown-menu a').click(function(){
		var holder = $(this).html();
		$('#lastnameLetter').text(holder + " ");
		$('#lastnameLetter').append('<span class="caret"></span>');
		$('.dropdown-menu').hide();
		value = false;
		var data = getData($('#letterInput').val());
		$.post('PHP-scripts/weddingGiftDB', data, function(results){
			console.log(results);
		});
	});

	function getData(value){
		return	{
			letter: "\""+ value + "\""
		}
	}
});
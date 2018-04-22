 $("#login-button").click(function(event){
	 event.preventDefault();
	 
	 $('form').fadeOut(1000, function() {
		$('.wrapper').addClass('form-success');
	
	 setTimeout(function() {$('#form1').submit();}, 2300);
	 });
});
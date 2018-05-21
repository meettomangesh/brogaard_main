<!--

function printViewportDimensions() {
	var viewportwidth = $(window).width();
	var viewportheight = window.innerHeight ? window.innerHeight : $(window).height();  
	$('#container').css('min-height', (viewportheight-100-20-0) + 'px');


}

printViewportDimensions();

$(function() {
	printViewportDimensions();
			
	$(window).resize(function() 
	{
	printViewportDimensions();
	});
});

//-->
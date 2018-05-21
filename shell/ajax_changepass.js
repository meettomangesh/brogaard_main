//  Developed by Roshan Bhattarai 
//  Visit http://roshanbh.com.np for this script and more.
//  This notice MUST stay intact for legal use

$(document).ready(function()
{
	$("#changepass-form").submit(function()
	{
		//remove all the class add the messagebox classes and start fading
		$("#msgbox").removeClass().addClass('messagebox').text('Validating....').fadeIn(1000);
		//check the username exists or not from ajax
		$.post("ajax_changepass.php",{ repassword:$('#repassword').val(),password:$('#password').val(),rand:Math.random() } ,function(data)
        {
		  if(data=='yes') //if correct login detail
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Logging in.....').addClass('messageboxok').fadeTo(900,1,
              function()
			  { 
			  	 //redirect to secure page
				 document.location='./loginstamp.php';
			  });
			  
			});
          }
		  if(data=='emptyfields')
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()
			{ 
			  $(this).html('Please enter your password').addClass('messageboxerror').fadeTo(900,1);
			});		
          }

		  if(data=='no')
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()
			{ 
			  $(this).html('Passwords you entered doesn\'t match.').addClass('messageboxerror').fadeTo(900,1);
			});		
          }
		
        });
 		return false;

	});
	//now call the ajax also focus move from 
	$("#submit").blur(function()
	{
		$("#changepass-form").trigger('submit');
	});
});
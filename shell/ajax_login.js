//  Developed by Roshan Bhattarai 
//  Visit http://roshanbh.com.np for this script and more.
//  This notice MUST stay intact for legal use

$(document).ready(function()
{
	$("#login-form").submit(function()
	{
		//remove all the class add the messagebox classes and start fading
		$("#msgbox").removeClass().addClass('messagebox').text('Validating....').fadeIn(1000);

		//check if rememberme checkbox is checked or not
		//http://jigowatt.co.uk/blog/add-checkboxes-radios-to-the-ajax-contact-form/
		var checkbox_value = '';
		if (jQuery('input#rememberme').is(':checked')) checkbox_value = 1; else checkbox_value = 0;

		//check the username exists or not from ajax
		$.post("ajax_login.php",{ username:$('#username').val(),password:$('#password').val(),rand:Math.random(),rememberme:checkbox_value } ,function(data)
        {
		  if(data=='yes') //if correct login detail // $('input[name=rememberme]').is(':checked')
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Logging in...').addClass('messageboxok').fadeTo(900,1,
              function()
			  { 				  
				  //var cookname = $("#username").val(); 
				  var url = "loginstamp.php";
					$(location).attr('href',url);
			  	 //redirect to secure page
				 //document.location='loginstamp.php';
			  });
			  
			});
          }

		  if(data=='emptyfields')
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()
			{ 
			  $(this).html('Please enter your username and password').addClass('messageboxerror').fadeTo(900,1);
			});		
          }

		  if(data=='no')
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()
			{ 
			  $(this).html('Username and passsword not match!').addClass('messageboxerror').fadeTo(900,1);
			});		
          }

		  if(data=='pchange') //if correct login detail
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('You must change your password after logging in...').addClass('messageboxok').fadeTo(900,1,
              function()
			  { 
			  	 //redirect to secure page
				 document.location='changepass.php';
			  });
			  
			});
          }

		  if(data=='noverified') //if correct login detail
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('You have to activate your account..1').addClass('messageboxok').fadeTo(900,1,
              function()
			  { 
			  	 //redirect to secure page
				 document.location='activate.php';
			  });
			  
			});
          }	

		  if(data=='unknown') //if Unknown Error occured
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()
			{ 
			  $(this).html('System Error!').addClass('messageboxerror').fadeTo(900,1);
			});		
          }

        });
 	  return false;

	});
	//now call the ajax also focus move from 
	$("#submit").blur(function()
	{
		$("#login-form").trigger('submit');
	});
});
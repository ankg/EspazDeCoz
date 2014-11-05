function loginHandler( e )
{
	e.preventDefault();

	var user = document.getElementById('username').value;
	var pass = document.getElementById('password').value;

	if( user === '' || pass === '' )
	{
		return;
	}

	var remember = document.getElementById('remember').checked;

	$.ajax( '/login',
		{
			type 		: 'POST',
			data 		:  { 
								'username' : user,
								'password' : pass, 
								'remember' : remember 
						   },
			dataType 	: 'json',
			error 		: loginErrorHandler,
			success 	: loginSuccessHandler,
		});
}

function displayError( msg )
{
	var error = $('#loginForm .error');
	error.text( msg );
	error.removeClass('hidden');
}
function loginErrorHandler(a,b,c)
{
	var msg = "Something went wrong !";
	displayError( msg );
}

function loginSuccessHandler( data )
{	
	if( !(data.access) )
	{
		displayError( data.msg );
	}
	else
	{
		document.location="/home";
	}
}

$(document).ready(function()
{
	var image = new Image;
	image.src = "app/assets/images/box.png";
	
	var loginForm = $('#loginForm > form');
	console.log(loginForm);
	loginForm.on( 'submit', loginHandler );
});
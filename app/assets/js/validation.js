$('#registerForm .inputField input').on('blur', inputFieldBlur);

function setGreenBorder( elt /* jquery object */ )
{
	var greenColor = "#79FA73";
	var errorClass 	= "error";

	removePrevErrorDialog( elt );
	elt.css({ 'border-color' : greenColor });
	elt.attr('data-valid', 'true');
	elt.parent().removeClass( errorClass );
	
}

function setDefaultBorder( elt /* jquery object */ )
{
	elt.css({ 'border-color' : '' });
	removePrevErrorDialog( elt );
}
function removePrevErrorDialog( elt /* jquery object */ )
{
	var errorDialogClass = "errorMsg";
	elt.parent().children( "." + errorDialogClass ).remove();
}
function setRedBorder( elt /* jquery object */ )
{
	var redColor 	= "#EB7B7B";
	var errorClass = "error";

	removePrevErrorDialog( elt );
	elt.css({ 'border-color' : redColor });
	elt.attr('data-valid', 'false');
	elt.parent().addClass( errorClass );
}

function displayErrorDialog( elt /* jquery object */ , msg )
{
	var dialog = document.createElement( 'span' );
	var dialogClass = "errorMsg";
	dialog = $( dialog );

	dialog.text( msg );
	dialog.addClass( dialogClass );
	dialog.appendTo( elt.parent() );
}

function checkUserName( username, clicked )
{
	if( username == '' )
		return;
	// change url accordingly
	$.ajax( '/register',
	{
		type : 'GET',
		dataType : 'json',
		data : { 'username' : username },
		success : getValidity
	});

	function getValidity( data )
	{
		if( data.valid )
		{
			// valid
			setGreenBorder( clicked );
		}
		else
		{
			// not valid
			var msg = data.msg;
			setRedBorder( clicked );
			displayErrorDialog( clicked, msg );
		}
	}
}

function inputFieldBlur( event )
{
	var clicked = $(this);
	var id = clicked.attr( 'id' );

	switch( id )
	{
		case "username":    checkUserName( clicked.val(), clicked );
							break;
		
		case "fullname":    var fullname = /^[a-zA-Z ]{1,30}$/;
							var inputName = clicked.val();
							
							if( inputName == "" )
							{
								setDefaultBorder( clicked );
								break;
							}
							
							if( inputName.match( fullname ) != null )
							{
								// valid
								setGreenBorder( clicked );
							}
							else
							{
								// invalid
								setRedBorder( clicked );
								var msg = "Your name doesn't contain valid characters a-z, A-Z and max 30 chracter allowed";
								displayErrorDialog( clicked, msg );
							}
							
							break;
		
		case "email":       var email = /[^@]{8}@iitr.ac.in/;
							var inputMail = clicked.val();
							
							if( inputMail == "" )
							{
								setDefaultBorder( clicked );
								break;
							}

							if( inputMail.match( email ) != null )
							{
								// valid
								setGreenBorder( clicked );
							}
							else
							{
								// invalid
								setRedBorder( clicked );
								var msg = "This is not valid IITR Webmail";
								displayErrorDialog( clicked, msg );
							}
		
							break;

		case "password":    var inputPassword = clicked.val();
							
							if( inputPassword == "" )
							{
								setDefaultBorder( clicked );
								break;
							}
							
							setGreenBorder( clicked );

							break;
	}
}
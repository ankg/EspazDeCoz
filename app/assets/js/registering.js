function checkFreeze()
{
	return !( $('input[data-valid="true"]').length == 4 );
}

function registerErrorHandler(a,b,c)

{
	console.log("Something went wrong !");	
}

function registerSuccess(data)
{
	data = JSON.parse(data);

	if(data.register)
	{
		$('.msg').removeClass('err');
		$('.msg').addClass('success');
		$('.msg .head1').text('Registered Succesfully !');
		$('.msg .head2').html('Redirecting in <span class="sec">3</span> sec');
	}
	else
	{
		$('.msg').removeClass('success');
		$('.msg').addClass('err');
		$('.msg .head1').text('Could Not Register');
		$('.msg .head2').text(data.msg);
	}
	$('.msg').fadeIn(300);

	setTimeout(function()
		{
			window.location = "/login";
		},3000);

	var left = 2;
	setInterval(function()
		{
			$('.success .sec').text(left);
			left--;
		},1000);
}

function getFormData()
{
	var radio = document.getElementsByName('status')[0];
	var status = radio.checked ? 0 : 1;
	var username = document.getElementById('username').value;
	var fullname = document.getElementById('fullname').value;
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;

	return { 
				'status' 	: status,
				'username' 	: username,
				'fullname' 	: fullname,
				'email' 	: email,
				'password' 	: password
			};
}

function registerHandler( e )
{
	e.preventDefault();
	if(checkFreeze())
	{
		console.log('All field not filled');
		return;
	}
	
	$(this).attr('value', 'Registering...');

	var formData = getFormData();

	// change url accordingly
	$.ajax( '/register',
		{
			type : 'POST',
			data : formData,
			dataType : 'html',
			error : registerErrorHandler,
			success : registerSuccess
		});
}

$(document).ready(function()
{
	var image = new Image;
	image.src = "app/assets/images/box.png";

	var registerForm = $('#registerForm > form');
	registerForm.on( 'submit', registerHandler );
});
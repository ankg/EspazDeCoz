function loadComment( postId )
{
	$.ajax( 'loadComment.php',
	{
		data : { post : postId },
		success : commentHandler
	});

	var post = $('div.single[data-id="'+postId+'"]');
	console.log(post);
	function commentHandler( data )
	{
		var totalComments = data.count;
		for( var i = 1; i <= totalComments; ++i )
		{
			displayComment( post, data[i].imageUrl, data[i].time, data[i].body );
		}
	}
}
function displayComment( elt, imageUrl, time, body /* as array each element is one paragraph */)
{
	var output 	= 	'<div class="load singleComment afterClear">' +
						'<div class="profilePic left">' +
							'<img src="'+imageUrl+'">'+
						'</div>'+
						'<div class="commentText left">'+
							'<p class="time">'+time+'</p>';

	var paragraph = body.length;
	var text = '';
	
	for( var i = 0; i < paragraph; ++i )
	{
		text += '<p>'+body[i]+'</p>';
	}

	output += text;
	output += '</div></div>';
	
	$(elt).children('.commentContainer').children('.comments').append( output );
}

function postComment()
{

}

function postHandler( e )
{
	e.preventDefault();
	
	var postBody 	= document.getElementById( 'postBody' ).value;
	var imageFile 	= document.getElementsByName( 'image' )[0].files;
	var otherFile 	= document.getElementsByName( 'file' )[0].files;
	
	var data = new FormData;

	data.append( 'postBody', postBody );
	
	var postFlag 	= false; // for not posting if there is nothing
	var fileUpload 	= false; // for showing progress bar or not

	if( postBody != '' )
	{
		postFlag = true;
	}

	if( imageFile.length == 1 )
	{
		// image selected
		data.append( 'image', imageFile[0] );
		postFlag 	= true;
		fileUpload 	= true;
	}
	if( otherFile.length == 1 )
	{
		// file selected
		data.append( 'file', otherFile[0] );
		postFlag 	= true;
		fileUpload 	= true;
	}
	
	if( !postFlag )
	{
		return;
	}

	var progress 	= $('.progress .highlight');
	var request 	= new XMLHttpRequest;

	request.open( 'POST', 'postUpload.php' );	

	if( fileUpload )
	{
		$('.progress').removeClass( 'invisible' );
		request.upload.onprogress = function( e )
			{
				if( e.lengthComputable )
				{
					var per = Math.round( 100 * e.loaded / e.total );
					progress.css( {width:per + '%'} );
					//console.log( "progress" );
				}
			};
	}

	request.onreadystatechange = function()
		{
			if( ( request.readyState === 4 ) && ( request.status === 200 ) )
			{
				console.log( request.response );
				document.getElementsByName( 'image' )[0].value = '';
				document.getElementsByName( 'file' )[0].value = '';
				progress.css( {width:'0%'} );
				$('.progress').addClass( 'invisible' );
			}
		};
	request.send( data )
	
}

function cancelHandler()
{
	document.getElementById('postBody').value 		= '';
	document.getElementsByName('image')[0].value 	= '';
	document.getElementsByName('file')[0].value 	= '';
}

function commentButton(e)
{
	var clicked = $(this);
	var text = clicked.val();
	if(text.match(/^[\s]*$/) == null)
	{
		clicked.next('.postComment').fadeIn(300);
	}
	else
	{
		clicked.next('.postComment').fadeOut(300);
	}
}

$(document).ready(function()
{
	$('.input > form').on('submit', postHandler);
	$('.button .cancel').on('click', cancelHandler);
	$('.commentArea .commentBody').on('keyup', commentButton);
});
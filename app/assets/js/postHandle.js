function voteHandler(e)
{
	var but = $(this);
	var post = $(but).parent().parent().parent();
	var postId = $(post).attr('data-id');
	var vote = true;

	if($(but).parent().hasClass('down'))
	{
		vote = false;
	}
	$.ajax('vote.php',
	{
		type 		: 'POST',
		dataType 	: 'json',
		data 		: { 'postId' : postId, 'vote' : vote },
		success 	: voteDone,
		error 		: voteError
	});

	function voteDone(data)
	{
		$(but).text(data.count);
	}
}

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

function slideComment(e)
{
	e.preventDefault();
	var post = $(this).parent().parent().parent('.singlePost');
	var postId = $(post).attr('data-id');
	if($(post).attr('data-load') == 'false')
	{
		loadComment(postId);
	}
	
	$(this).parent().parent().children('.comments').fadeToggle(300);
}

function displayPost( postId, profileImage, userId, userName, postBody, courseId, courseTitle, branch, imageUrl, fileUrl )
{
	var output = 
					'<div class="singlePost" data-id="'+postId+'" data-load="true">'+
						'<div class="head afterClear">'+
							'<div class="vote">'+
								'<div class="up"><button>0</button></div>'+
								'<div class="down"><button>0</button></div>'+
							'</div>'+
							'<div class="left profilePic">'+
								'<img src="'+profileImage+'">'+
							'</div>'+
							'<div class="left heading">'+
								'<p><a class="ref" href="/profile/'+userId+'">'+userName+'</a> posted in <a class="ref" href="/course/'+branch+'/'+courseId+'">'+courseTitle+'</a></p>'+
								'<h6 class="time">Just now</h6>'+
							'</div>'+
						'</div>'+
						'<div class="postBody afterClear">'+
							'<div class="textContent">';

	var textContent = '';
	var allLines = postBody.split('%0D%0');
	var countLine = allLines.length;
	for( var i = 0; i < countLine; ++i )
	{
		textContent += '<p>'+decodeURI(allLines[i])+'</p>';
	}

	output += textContent;
	
	output +=				'</div>';
	if( imageUrl != '')
	{
		output +=			'<div class="imageContent">'+
								'<img src="/'+imageUrl+'">'+
							'</div>';
	}
	if(fileUrl != '')
	{
		var ext = fileUrl.split('.')[1];
		output +=			'<div class="fileContent afterClear">'+
								'<div class="left thumbnail">'+
									'<img data-type="'+ext+'" src="/app/assets/images/fileicon/'+ext+'.png">'+
								'</div>'+
								'<div class="downloadLink left">'+
									'<a href="/'+fileUrl+'" downlaod>Download</a>'+
								'</div>'+
							'</div>';
	}

	output +=			'</div>'+
						'<div class="commentContainer">'+
							'<div class="commentLink"><a href="">Comments <span>(0)</span></a></div>'+
							'<div class="comments hidden">'+
								/*'<div class="singleComment afterClear">'+
									'<div class="profilePic left">'+
										'<img src="/app/assets/images/me.jpg">'+
									'</div>'+
									'<div class="commentText left">
										'<p class="time">1 min ago</p>
										'<p>OMG!!</p>
										<p>Thank u kapil</p>
										<p>This helps me so much</p>
									</div>
								</div>*/
							'</div>'+
							'<div class="commentEditor afterClear">'+
								'<div class="left profilePic">'+
									'<img src="'+profileImage+'">'+
								'</div>'+
								'<div class="left commentArea">'+
									'<form>'+
										'<textarea placeholder="Post a comment..." spellcheck="false" autocorrect="off" class="commentBody"></textarea>'+
										'<input class="postComment" type="submit" value="Comment">'+
									'</form>'+
								'</div>'
							'</div>'
						'</div>'
					'</div>';

	$('.posts .leftPosts .input').after(output);
	//$(output).after($('.posts .leftPosts .input'));
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

function postComment(e)
{
	e.preventDefault();

	var commentBody = $(this).parent().children('.commentBody').val();
	var post = $(this).parent().parent().parent().parent().parent();
	var postId = $(post).attr('data-id');

	$.ajax('postComment.php',
	{
		type 		: 'POST',
		dataType 	: 'json',
		data 		: { 'commentBody' : commentBody, 'postId' : postId },
		success 	: commentSuccess,
		error 		: commentError
	});

	function commentSuccess(data)
	{
		displayComment(post, data.imageUrl, data.time, data.body);
	}

	function commentError()
	{
		console.log('Comment not posted');
	}
}

function postHandler( e )
{
	e.preventDefault();
	
	var postBody 	= document.getElementById( 'postBody' ).value;
	var imageFile 	= document.getElementsByName( 'image' )[0].files;
	var otherFile 	= document.getElementsByName( 'file' )[0].files;
	
	var data = new FormData;

	var courseId = $('.singleCourse .courseName').attr('data-course');
	data.append( 'postBody', postBody );
	data.append( 'course_id', courseId);
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

	request.open( 'POST', '/posts' );	

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
				var data = JSON.parse(request.response);
				console.log(data);

				var profileImage = $('#header #profile img').attr('src');
				displayPost( data.post_id, profileImage, data.uid, data.username, data.post, data.course_id, data.course_title, data.branch, data.image_url, data.file_url);

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
	$('.postComment').on('click',postComment);
	$('.commentContainer .commentLink a').on('click', slideComment);
	$('.singlePost .vote button').on('click',voteHandler);
});
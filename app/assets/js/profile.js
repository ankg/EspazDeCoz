function menuHandler(e)
{
	e.preventDefault();
	var clicked = e.target;
	clicked = $(clicked).attr('data-menu');
	var active =$('.menu a.active').attr('data-menu');
	if(clicked != active )
	{
		$('.menu a[data-menu="'+active+'"]').removeClass('active');
		$('.menu a[data-menu="'+clicked+'"]').addClass('active');
		$('#container .'+active).fadeOut(0);
		$('#container .'+clicked).fadeIn(300);
	}
}

function editAboutHandler()
{
	$(this).off('click',editAboutHandler);
	$(this).text('Editing...');
	$(this).addClass('opaque');

	var type = $(this).parent('.type').parent();
	var editField = $(type).children('.type').attr('data-type');

	if( editField == 'work' || editField == 'skills' )
	{
		$(type).children('.add').removeClass('hidden');
		$(type).children('.add').on('click', addField);
	}

	var text = $(type).children('.text');
	$(text).removeAttr('readonly');
	$(text).addClass('textBorder');

	var save = $(type).children('.save');
	//console.log(save);
	$(save).removeClass('hidden');
	$(save).on('click', saveButtonHandler);
	console.log('hi');
	//$(this).on('click',editAboutHandler);
}

function addField()
{
	var newField = $(this).parent().children('.text')[0].cloneNode();
	newField.value = '';
	console.log(newField);
	$(this).before($(newField));
}

function saveButtonHandler()
{
	$(this).text('Saving...');
	var save = $(this);
	var type = $(this).parent();
	var editField = $(type).children('.type').attr('data-type');
	var data = {};
	data.type = editField;
	var texts = $(type).children('.text');
	var totalLength = texts.length;

	switch(editField)
	{
		case 'quote' 	: 	data.value = $(texts).val();
			break;
		case 'academic' : 	data.branch = $(texts[0]).val();
							data.year =  $(texts[1]).val();
			break;
		case 'work' 	: 	var workArray = [];
							var count = 0;
							for( var i = 0; i < totalLength; ++i )
							{
								var fieldValue = $(texts[i]).val();
								if(fieldValue != '') 
								{	
									workArray[count++] = fieldValue;
								}
								else
								{
									$(texts[i]).remove();
								}
							}
							data.workData = workArray;
			break;
		case 'skills'	: 	var skillsArray = [];
							var count = 0;
							for( var i = 0; i < totalLength; ++i )
							{
								var fieldValue = $(texts[i]).val();
								if(fieldValue != '')
								{	
									skillsArray[count++] = fieldValue;
								}
								else
								{
									$(texts[i]).remove();
								}
							}
							data.skillsData = skillsArray;
			break;
	}

	console.log(data);
	$.ajax('/profile',
		{
			type : 'GET',
			data : data,
			dataType : "html",
			success : editDone,
			error : editError
		});

	console.log('done');
	function editDone()
	{
		$(save).text('Saved');
		$(save).fadeOut(300,function()
			{
				$(save).addClass('hidden');
				$(save).text('Save');
				$(save).removeAttr('style');
			});
		var edit = $(save).parent().children('.type').children('.edit');
		$(type).children('.add').fadeOut(300,function()
			{
				$(type).children('.add').addClass('hidden');
				$(type).children('.add').removeAttr('style');
			});
		//$(type).children('.add').removeAttr('style');
		$(type).children('.add').off('click',addField);
		$(edit).text('Edit');
		$(edit).removeClass('opaque');
		$(edit).on('click',editAboutHandler);
		$(this).off('click',saveButtonHandler);
		$(texts).removeClass('textBorder');
		$(texts).attr('readonly', 'readonly');
	}

	function editError()
	{
		console.log('Something wrong in edit');
	}
}

function freezePicUpload(e)
{
	e.preventDefault();
}

function editImage()
{
	var request = new XMLHttpRequest;
	var url = "/uploadprofile";
	request.open('POST', url);
	var data = new FormData;

	var image = document.getElementsByClassName('picEdit')[0];
	image = image.children[0].children[0]
	//console.log(image);
	image = image.files[0];
	//console.log(image);
	data.append('image',image);

	$('.picContainer .loading').removeClass('hidden');
	$('.picEdit .edit').on('click',freezePicUpload);
	request.onreadystatechange = function()
		{
			if( request.readyState === 4 && request.status == 200 )
			{
				var data = JSON.parse(request.response);
				$('.picEdit .edit').off('click',freezePicUpload);
				$('.picContainer').attr('style', 'background-image:url("'+data.url+'")');
				$('#profile a').attr('style', 'background-image:url("'+data.url+'")');
				$('.picContainer .loading').addClass('hidden');
			}
		}
	request.send(data);
}

$(document).ready(function()
{
	$('.menu').on('click', menuHandler);
	$('.type .edit').on('click', editAboutHandler);
	$('.picEdit .edit input[type="file"]').on('change',editImage);
});
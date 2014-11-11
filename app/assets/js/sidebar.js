function slideSidebar()
{
	var sidebar = $('#sidebar');
	var button = $('#sidebar .button');
	var left = $(sidebar).css('left');
	//console.log(left);

	if(left == '0px')
	{
		$(sidebar).css({'left' : '-190px'});
		$(button).css({'right' : '-40px'});
	}
	else
	{
		$(sidebar).css({'left' : '0px'});
		$(button).css({'right' : '0px'});
	}
}